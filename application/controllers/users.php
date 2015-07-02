<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * This is user controller of bidding
 *
 * @package		CodeIgniter
 * @category	controller
 * @author		Gnanasekaran
 * @link		http://innoppl.com/
 *
 */

include APPPATH.'/controllers/common.php';
class Users extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//if not login redirect to home
		if($this->session->userdata('logged_in') == false)
		{
			redirect(base_url().'login/', 'refresh');
		}
		//load login model
		$this->load->model('users_model');
	
	}
	//User view page
	public function index()
	{
		$data['siteTitle'] = 'Users - '.SITE_NAME;
		$data['user_list']=$this->users_model->user_list();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/users/view', $data);
		$this->load->view('admin/footer');
		
	}
	
	//user add
	public function add(){
		$data['siteTitle'] = 'Users - '.SITE_NAME;
		$data['ErrorMessages'] = '';
		//if set post
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{				
			$config = array(
					array('field' => 'name',
							'label' => 'User name',
							'rules' => 'trim|required|alpha_numeric|min_length[3]|max_length[30]'),
					array('field' => 'email',
							'label' => 'Email',
							'rules' => 'trim|required|min_length[3]|max_length[80]|callback_check_unique_useremail'),
					array('field' => 'password',
							'label' => 'Password',
							'rules' => 'trim|required|min_length[3]|max_length[15]'),
					array('field' => 'phone',
							'label' => 'Phone Number',
							'rules' => 'trim|numeric|max_length[15]'),
					array('field' => 'address',
							'label' => 'Address',
							'rules' => 'trim|required|max_length[150]'),
					array('field' => 'role',
							'label' => 'role',
							'rules' => 'trim|required'),
			);
			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if($this->form_validation->run() == FALSE)
			{
				$data['ErrorMessages'] = validation_errors();
			}
			else
			{
				if( $this->users_model->add_user($_POST))
				{
					$this->session->set_flashdata('SucMessage',USERS_CREATED_SUS);
					redirect(base_url().'users/','refresh');
				}
			}
		}
		
		//view user add
		$this->load->view('admin/header',$data);
		$this->load->view('admin/users/add');
		$this->load->view('admin/footer',$data);
	}
	
	
	function check_unique_useremail($str)
	{
		if(preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,4})$/", $str)) 
		{
			$unique = $this->users_model->check_useremail($str);
			if(!$unique)
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_unique_useremail', USER_EMAIL_ALREADY_EXIST);
				return FALSE;
			}
		}
		else
		{
			$this->form_validation->set_message('check_unique_useremail', INVALID_EMAIL);
			return FALSE;
		}
	}
	
	// User single view
	public function view($id)
	{
		$data['siteTitle'] = 'Users - '.SITE_NAME;
		$data['ErrorMessages'] = '';
		$data['SucMessage']='';
	
		if($this->users_model->get_users_details($id))
		{
			$data['user_id']=$id;
			$data['users_details']=$this->users_model->get_users_details($id);
			$data['users_role']=$this->users_model->get_users_role($id);
			$this->load->view('admin/header',$data);
			$this->load->view('admin/users/singleview', $data);
			$this->load->view('admin/footer');
		}
		else {
			redirect(base_url().'users/','refresh');
		}
	}
	
	// Edit Users 
	public function edit($id)
	{
		$data['siteTitle'] = 'Users - '.SITE_NAME;
		$data['ErrorMessages'] = '';
		$data['SucMessage']='';
		
		if($this->users_model->get_users_details($id))
		{ 
			if (($this->input->server('REQUEST_METHOD') == 'POST'))
			{
				$config = array(
						array('field' => 'name',
								'label' => 'User Name',
								'rules' => 'trim|required|alpha_numeric|min_length[3]|max_length[30]'),
						array('field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|required|min_length[3]|max_length[80]|callback_check_unique_useremail_edit'),
						array('field' => 'password',
								'label' => 'Password',
								'rules' => 'trim|required|min_length[3]|max_length[15]'),
						array('field' => 'phone',
								'label' => 'Phone Number',
								'rules' => 'trim|numeric|max_length[15]'),
						array('field' => 'address',
								'label' => 'Address',
								'rules' => 'trim|required|max_length[150]'),
						array('field' => 'role',
								'label' => 'role',
								'rules' => 'trim|required|max_length[2]'),
				);
				$this->form_validation->set_rules($config);
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
				if($this->form_validation->run() == FALSE){
					$data['ErrorMessages'] = validation_errors();
				}
				else
				{
						if($this->users_model->add_user($_POST,$id) )
						{
							$data['SucMessage']=USERS_UPDATED_SUS;
							$this->session->set_flashdata('SucMessage',USERS_UPDATED_SUS);
							$data['siteTitle'] = 'Users - '.SITE_NAME;
							$data['ErrorMessages'] = '';
							redirect(base_url().'users',"refresh");
						}
				}
			}
			
				$data['user_id']=$id;
				$data['users_details']=$this->users_model->get_users_details($id);
				$data['users_role']=$this->users_model->get_users_role($id);
				$this->load->view('admin/header',$data);
				$this->load->view('admin/users/edit', $data);
				$this->load->view('admin/footer');
		}
		else {
				$this->session->set_flashdata('SucMessage','Invalid User');
				redirect(base_url().'users/','refresh');
		}
	}
	
	// Unique email validation for edit
	function check_unique_useremail_edit($str)
	{
		if(preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,4})$/", $str)) {
			$user_id = $this->uri->segment(3);
			$unique = $this->users_model->check_useremail_edit($str,$user_id);
			if(!$unique)
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_unique_useremail_edit', USER_EMAIL_ALREADY_EXIST);
				return FALSE;
			}
		}
		else
		{
			$this->form_validation->set_message('check_unique_useremail_edit', INVALID_EMAIL);
			return FALSE;
		}
	}
	
	// User delete 
	public function delete($id)
	{
		if ($this->users_model->get_users_details($id))
		{
			$result = $this->users_model->delete_user($id);
			if($result){
				$this->session->set_flashdata('SucMessage', USER_DELETE_SUS);
				redirect(base_url().'users/', 'refresh');
			}
			else {
				echo "Unfourtunatly user could not delete";
			}
		}
		else
		{
			redirect(base_url().'users/', 'refresh');
		}
	}
	
}