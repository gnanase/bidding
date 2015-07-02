<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * This is login controller of bidding
 *
 * @package		CodeIgniter
 * @category	controller
 * @author		Gnanasekaran
 * @link		http://innoppl.com/
 *
 */

include APPPATH.'/controllers/common.php';
class Login extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//if not login redirect to home
		if($this->session->userdata('logged_in') == true)
		{
			redirect(base_url().'dashboard/', 'refresh');
		}
		//load login model
		$this->load->model('login_model');
		
	}
	
	//Login page
	public function index()
	{
		$data['siteTitle'] = 'Login - '.SITE_NAME;	
		$data['ErrorMessages']="";
		//if set login credentials
		if(($this->input->server('REQUEST_METHOD')=="POST"))		
		{
		   $this->form_validation->set_rules('email','Email','trim|required|valid_email');
		   $this->form_validation->set_rules('password','Password','trim|required');	
		   
		   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		   if($this->form_validation->run()==false)
		   {
		   	 	$data['ErrorMessages']=validation_errors();
		   }
		   else
		   {
		   	  $email = $this->input->post('email');
		   	  $password = AES_Encode($this->input->post('password'));
		   	  //send values to model
		      $valid_user=$this->login_model->check_login($email,$password);
		      if($valid_user != NULL)
		      {
		      	redirect('dashboard','refresh');
		      }	
		      else {
		      	$data['InvalidMessages'] = INVALID_CREDENTIALS;
		      }
		   }
		}
		//login view form
		$this->load->view('admin/login',$data);
	}
	
	
}
