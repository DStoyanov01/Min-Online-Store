<?php
class Product_manager extends CI_Model {
	
	var $my_teble = 'products';
	
	public function __construct(){
		$this->load->database();
	}
	
	function get_all(){
		
		$query = $this->db->get($this->my_teble);
		return $query->result_array();

	}
	
	function getByCategory($category_id = 7){
		
		$query = $this->db->get_where($this->my_teble, array('category_id' => $category_id));
		return $query->result_array();
	}
	
	function getOneArr($id){
		$query = $this->db->get_where($this->my_teble, array('id' => $id));
		return $query->row_array();
	}
	
	function insertOne($params = array()){
		
		if(empty($params)){
			return false;
		}
		
		$this->db->insert($this->my_teble, $params); 
		
		$err=$this->db->error();
		
		if (!empty($err['code'])) {
			return false;
		}
		
		$insert_id=$this->db->insert_id();
		
		return $insert_id;
	}
}