<?php
/**
 *
 * This is product model of bidding
 *
 * @package		CodeIgniter
 * @category	Model
 * @author		Gnanasekaran
 * @link		http://innoppl.com/
 *
 */

class Product_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	//Add product into product table
	public function add_product($set_data)
	{
		 $str = $set_data['intervel']; 
		if ($str != NULL)
		{
			$date = explode('-', $str); 
			$str1 = str_replace('/','-',$date[0]);
			$end = str_replace('/','-',$date[1]); 
		}
		
		$uid = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');
		
		$create_on = date('Y-m-d h:i:s');
		$product_detail = array(
				'user_id'		=> $uid,
				'name' 			=> $set_data['name'],
				'code' 			=> $set_data['code'],
				'desc' 			=> $set_data['desc'],
				'image' 		=> $set_data['pimage'],
				'price' 		=> $set_data['price'],
				'min_price' 	=> $set_data['min_price'],
				'bid_fee' 		=> $set_data['bid_fee'],
				'start_date' 	=> trim($str1),
				'end_date' 		=> trim($end),
				'status' 		=> $set_data['status'],
				'created_on' 	=> $create_on,
				'created_by' 	=> $user_name
		);
		$this->db->insert("product", $product_detail);
		$pId = $this->db->insert_id();
		return $pId;
	}
	
	//Edit product into product table
	public function edit_product($set_data,$pId)
	{
	$str = $set_data['intervel']; 
		if ($str != NULL)
		{
			$date = explode('-', $str); 
			$str1 = str_replace('/','-',$date[0]);
			$end = str_replace('/','-',$date[1]); 
		}
		
		$uid = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');
	
		$updated_on = date('Y-m-d h:i:s');
		$product_detail = array(
				'user_id'		=> $uid,
				'name' 			=> $set_data['name'],
				'code' 			=> $set_data['code'],
				'desc' 			=> $set_data['desc'],
				'image' 		=> $set_data['pimage'],
				'price' 		=> $set_data['price'],
				'min_price' 	=> $set_data['min_price'],
				'bid_fee' 		=> $set_data['bid_fee'],
				'start_date' 	=> trim($str1),
				'end_date' 		=> trim($end),
				'status' 		=> $set_data['status'],
				'updated_on' 	=> $updated_on,
				'updated_by' 	=> $user_name
		);
		$this->db->where('md5(id)', $pId);
		$this->db->update('product',$product_detail);
		return $pId;
	}
	
	//List product from product table
	public function products_list()
	{
		$uid = $this->session->userdata('user_id');
		
		$select=array('PR.id as product_id','PR.name','PR.code','PR.desc','PR.image','PR.price','PR.min_price','PR.bid_fee','PR.start_date','PR.end_date','PR.status');
		$this->db->select($select);
		$this->db->from('product as PR');
		$this->db->where('PR.user_id =', $uid);
		$this->db->order_by("PR.name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	//Get single product details from product table
	public function get_product_details($id)
	{
		$select=array('PR.id as product_id','PR.name','PR.code','PR.desc','PR.image','PR.price','PR.min_price','PR.bid_fee','PR.start_date','PR.end_date','PR.status');
		$this->db->select($select);
		$this->db->from('product as PR');
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
	

	//Unique check product code in product table
	function check_unique_code($code, $id)
	{
		$this->db->select('code');
		$this->db->from('product');
		$this->db->where('code',$code);
		$this->db->where('md5(id) !=',$id);
		$query = $this->db->get();
		return count($query->result_array());
	} 
	
	//Delete Product in product table
	public function delete_product($product_id)
	{
		$this->db->where('md5(id)', $product_id);
		$this->db->delete('product');
		return true;
	}
	
	
}