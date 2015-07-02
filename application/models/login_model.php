<?php
/**
 *
 * This is login model of bidding
 *
 * @package		CodeIgniter
 * @category	Model
 * @author		Gnanasekaran
 * @link		http://innoppl.com/
 *
 */

class Login_model extends CI_Model {

	public function __construct()
	{
			
	}
	
	//login credential check and set session for user
	public function check_login($email,$password)
	{		
		$select=array('US.id','US.name','US.email', 'US.status as status','RU.rid');
		$this->db->select($select);
		$this->db->from('users As US');
		$this->db->join('role_user as RU', 'RU.uid=US.id', 'left');
		$this->db->where('email',$email);
		$this->db->where('status','1');
		$this->db->where('RU.rid','1');
		
		$this->db->where('password',$password);
		$query=$this->db->get();
		
		if($query->num_rows()>0)
		{
			$validUser=$query->result_array();
			
			if($validUser[0]['status']=='1')
			{
				//session set
				$session=array(
					'user_id'=>$validUser[0]['id'],
					'user_name'=>$validUser[0]['name'],
					'role_id'=>$validUser[0]['rid'],
					'mail'=>$validUser[0]['email'],
					'logged_in'=>true
				);
				$this->session->set_userdata($session);
				return $validUser[0]['id']; 
			}
			else
		    {
				return ACCOUNT_DEACTIVE;
			}
		}
		else
		{
			return false;
		}
	}
	
	
	
}
?>
