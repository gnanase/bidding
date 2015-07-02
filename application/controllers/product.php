<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * This is product controller of bidding
 *
 * @package		CodeIgniter
 * @category	controller
 * @author		Gnanasekaran
 * @link		http://innoppl.com/
 *
 */

include APPPATH.'/controllers/common.php';
class Product extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//if not login redirect to home
		if($this->session->userdata('logged_in') == false)
		{
			redirect(base_url().'login/', 'refresh');
		}
		//load login model
		$this->load->model('product_model');
	
	}
	//User view page
	public function index()
	{
		$data['siteTitle'] = 'Product - '.SITE_NAME;
		$data['product_list']=$this->product_model->products_list();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/product/view', $data);
		$this->load->view('admin/footer');
	}
	
	//add product
	public function add(){
		$data['siteTitle'] = 'Product - '.SITE_NAME;
		
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{ 
			$config = array(
					array('field' => 'name',
							'label' => 'Product Name',
							'rules' => 'trim|required'),
					array('field' => 'code',
							'label' => 'Product Code',
							'rules' => 'trim|is_unique[product.code]'),
					array('field' => 'desc',
							'label' => 'Description',
							'rules' => 'trim|required'),
					array('field' => 'price',
							'label' => 'Price',
							'rules' => 'trim'),
					array('field' => 'min_price',
							'label' => 'Minimum Price',
							'rules' => 'trim|required'),
					array('field' => 'bid_fee',
							'label' => 'Bid Fee',
							'rules' => 'trim|required'),
					array('field' => 'status',
							'label' => 'Status',
							'rules' => 'trim|required|numeric'),
					array('field' => 'intervel',
							'label' => 'Intervel',
							'rules' => 'trim|required')
			);
			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if($this->form_validation->run() != FALSE){
				
				if(isset($_FILES['pimage']['name']) && $_FILES['pimage']['name']!='')
				{
					$fileExtension2 = explode(".", $_FILES['pimage']['name']);
					$fileExt = array_pop( $fileExtension2 );
					$filename = time().'-'.md5($_FILES['pimage']['name']).".".$fileExt;
					$config['upload_path'] = PRODUCT_IMAGE_PATH;
					$config['allowed_types'] = 'jpg|png|jpeg|gif';
					$config['file_name'] = $filename;
		
					$image_path = $filename;
						
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('pimage'))
					{
						$error = array('error' => $this->upload->display_errors());
						$data['ErrorMessages'] = $error['error'];
					}
					else
					{
						$uploaddata = array('upload_data' => $this->upload->data());
						$_POST['pimage']=$filename;
						$this->product_model->add_product($_POST);	
						$this->session->set_flashdata('SucMessage',PRODUCT_ADDED_SUS);
						redirect(base_url().'product/','refresh');
					}
				}
				else
				{
					$data['ErrorMessages'] = '<div class="error">'.IMG_REQUIRED.'</div>';
				}
			}
			else
			{
				$data['ErrorMessages'] = validation_errors();					
			}
				
		}
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/product/add', $data);
		$this->load->view('admin/footer');
	}
	
	// Product single view
	public function view($id)
	{
		$data['siteTitle'] = 'Products - '.SITE_NAME;
		$data['ErrorMessages'] = '';
		$data['SucMessage']='';
	
		if($this->product_model->get_product_details($id))
		{
			$data['user_id']=$id;
			$data['product_details']= $this->product_model->get_product_details($id);
			$this->load->view('admin/header',$data);
			$this->load->view('admin/product/singleview', $data);
			$this->load->view('admin/footer');
		}
		else {
			redirect(base_url().'product/','refresh');
		}
	}
	
	//Edit product
	public function edit($id){
		$data['siteTitle'] = 'Product - '.SITE_NAME;
		
		if($this->product_model->get_product_details($id))
		{
			if (($this->input->server('REQUEST_METHOD') == 'POST'))
			{
				$config = array(
						array('field' => 'name',
								'label' => 'Product Name',
								'rules' => 'trim|required'),
						array('field' => 'code',
								'label' => 'Product Code',
								'rules' => 'trim|callback_check_unique_code'),
						array('field' => 'desc',
								'label' => 'Description',
								'rules' => 'trim|required'),
						array('field' => 'price',
								'label' => 'Price',
								'rules' => 'trim'),
						array('field' => 'min_price',
								'label' => 'Minimum Price',
								'rules' => 'trim|required'),
						array('field' => 'bid_fee',
								'label' => 'Bid Fee',
								'rules' => 'trim|required'),
						array('field' => 'status',
								'label' => 'Status',
								'rules' => 'trim|required|numeric'),
						array('field' => 'intervel',
								'label' => 'Intervel',
								'rules' => 'trim|required')
				);
				$this->form_validation->set_rules($config);
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if($this->form_validation->run() != FALSE){
		
					if(isset($_FILES['pimage']['name']) && $_FILES['pimage']['name']!='')
					{
						$fileExtension2 = explode(".", $_FILES['pimage']['name']);
						$fileExt = array_pop( $fileExtension2 );
						$filename = time().'-'.md5($_FILES['pimage']['name']).".".$fileExt;
						$config['upload_path'] = PRODUCT_IMAGE_PATH;
						$config['allowed_types'] = 'jpg|png|jpeg|gif';
						$config['file_name'] = $filename;
		
						$image_path = $filename;
		
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('pimage'))
						{
							$error = array('error' => $this->upload->display_errors());
							$data['ErrorMessages'] = $error['error'];
							//print_r($data['ErrorMessages']); die;
						}
						else
						{
							$uploaddata = array('upload_data' => $this->upload->data());
							$_POST['pimage']=$filename;
							$this->product_model->edit_product($_POST, $id);
							$this->session->set_flashdata('SucMessage',PRODUCT_UPDATED_SUS);
							redirect(base_url().'product/','refresh');
						}
					}
					elseif (isset($_POST['pimage']) && $_POST['pimage'] != NULL){
						
						$this->product_model->edit_product($_POST, $id);
						$this->session->set_flashdata('SucMessage',PRODUCT_UPDATED_SUS);
						redirect(base_url().'product/','refresh');
					}
					else
					{
						$data['ErrorMessages'] = '<div class="error">'.IMG_REQUIRED.'</div>';
					}
				}
				else
				{
					$data['ErrorMessages'] = validation_errors();
				}
		
			}
			
			$data['product_id']=$id;
			$data['product_details']=$this->product_model->get_product_details($id);
			$this->load->view('admin/header',$data);
			$this->load->view('admin/product/edit', $data);
			$this->load->view('admin/footer');
		}
		else {
			$this->session->set_flashdata('SucMessage','Invalid Product');
			redirect(base_url().'product/','refresh');
		}
	}
	
	// Unique code validation for edit
	 function check_unique_code($str)
	{ 	  	
			$id = $this->uri->segment(3); 
			$unique = $this->product_model->check_unique_code($str, $id);
			if(!$unique)
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_unique_code', PRODUCT_CODE_ALREADY_EXIST);
				return FALSE;
			}
	} 
	
	
	// Product delete
	public function delete($id)
	{
		if ($this->product_model->get_product_details($id))
		{
			$result = $this->product_model->delete_product($id);
			if($result)
			{
				$this->session->set_flashdata('SucMessage', PRODUCT_DELETE_SUS);
				redirect(base_url().'product/', 'refresh');
			}
			else 
			{
				echo PRODUCT_DELETE_UNSUS;
			}
		}
		else
		{
			redirect(base_url().'users/', 'refresh');
		}
	}
	
	
	
}