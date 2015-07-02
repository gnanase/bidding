<?php
/**
 *
 * This is user model of bidding
 *
 * @package		CodeIgniter
 * @category	Model
 * @author		Gnanasekaran
 * @link		http://innoppl.com/
 *
 */

class Users_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function add_user($set_data,$uId=NULL)
	{
		$create_on = date('Y-m-d h:i:s');
		
		$user_detail = array(
				'name' 			=> $set_data['name'],
				'password' 		=> AES_Encode($set_data['password']),
				'email' 		=> $set_data['email'],
				'phone' 		=> isset($set_data['phone'])?$set_data['phone']:'',
				'address' 		=> $set_data['address'],
				'status' 		=> $set_data['status'],
				'created_on' 	=> $create_on
		);
		if(isset($uId) && !empty($uId)){
			$this->db->where('md5(id)', $uId);
			$this->db->update('users',$user_detail);
				
			$user_role_data = array(
					'rid'=>$set_data['role']
			);
			$this->db->where('md5(uid)', $uId);
			$this->db->update('role_user', $user_role_data);
		}
		else{
			$this->db->insert("users", $user_detail);
			$uId = $this->db->insert_id();
				
			$user_role_data = array(
					'uid'=>$uId,
					'rid'=>$set_data['role']
			);
			$this->db->insert("role_user", $user_role_data);
		}
		return $uId;
	}
	
	function check_useremail($email)
	{
		$this->db->select('email');
		$this->db->from('users');
		$this->db->where('email',$email);
		$query = $this->db->get();
		return count($query->result_array());
	}
	
	function check_useremail_edit($str,$users_id)
	{
		$this->db->select('email');
		$this->db->from('users');
		$this->db->where('email',$str);
		$this->db->where('md5(id) !=',$users_id);
		$query = $this->db->get();
		return count($query->result_array());
	}
	
	public function user_list()
	{
		$query_set=array();
		$select=array('US.id as user_id','US.name','US.email','US.phone','US.address','US.status','RO.role');
		$this->db->select($select);
		$this->db->from('users as US');
		$this->db->join('role_user as RU','RU.uid=US.id','left');
		$this->db->join('role as RO', 'RO.id=RU.rid','left');
		$this->db->where('RU.rid !=', '1');
		$this->db->order_by("US.name", "asc");
		$query = $this->db->get();
		
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	public function get_users_details($id)
	{
		$select=array('US.id as user_id','US.name','US.password','US.email','US.phone','US.address','US.status');
		$this->db->select($select);
		$this->db->from('users as US');
		$this->db->where("md5(id)", $id);
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			return $query_set[0];
		}
		else
		{
			return false;
		}
	}
	
	public function get_users_role($id){
		$select=array('RS.role_uid as id','RS.uid','RS.rid');
		$this->db->select($select);
		$this->db->from('role_user as RS');
		$this->db->where("md5(uid)", $id);
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			return $query_set[0];
		}
		else
		{
			return false;
		}
	}
	
	public function delete_user($usr_id)
	{
		$this->db->where('md5(id)', $usr_id);
		$this->db->delete('users');
		
		//delete user details in role_user table
		$this->db->where('md5(uid)', $usr_id);
		$this->db->delete('role_user');
		return true;
	}
	
	
	
}