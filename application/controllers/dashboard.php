<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 *
 * This is Dashboard of bidding
 *
 * @package	    Dashboard
 * @category	Controller
 * @author	    Gnanasekaran
 * @link	    http://innoppl.com/
 *
 */


class Dashboard extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('logged_in') == false)
		{
			redirect(base_url().'login/', 'refresh');
		}
		
	}
	
	
	public function index()
	{
		$data['siteTitle'] = 'Dashboard - '.SITE_NAME;	
		$this->load->view('admin/header',$data);	
			
		$this->load->view('admin/footer');
	}
	
	public function logout(){
		$session=array(
				'user_id'=>'',
				'user_name'=>'',
				'role_id'=>'',
				'mail'=>'',
				'logged_in'=>false
		);
		
		$this->session->unset_userdata($session);
		$this->session->sess_destroy(); 
		redirect(base_url()."login", 'refresh');	
				
	}
  
}

