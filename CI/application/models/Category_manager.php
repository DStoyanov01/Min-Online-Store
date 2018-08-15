<?php
class Category_manager extends CI_Model {
	
	var $my_table = 'category';
	
	public function __construct(){
		$this->load->database();
	}
	
	function get_all(){
		
		$query = $this->db->get($this->my_table);
		return $query->result_array();

	}
	
	function getWholeTree(){
		
		$records = $this->get_all();
		
		foreach($records as &$rec){
			$rec['childs'] = $this->getByParentId($rec['id']);
		}
		
		return $records;
	}
	
	function getById($id){
		$query = $this->db->get_where($this->my_table, array('id' => $id));
		return $query->row_array();
	}
	
	function getByParentId($parent_id = 0){
		
		$query = $this->db->get_where($this->my_table, array('parent_id' => $parent_id));
		return $query->result_array();
	}
	
	function getSecondaryCategories(){
		// $str = "SELECT * FROM ".$this->my_table." WHERE parent_id!=0";
		// $query = $this->db->query($str);
		$query = $this->db->get_where($this->my_table, array('parent_id !=' => 0));
		return $query->result_array();
		return $query->result_array();
	}
	
	function insertOne($params = array()){
		
		if(empty($params)){
			return false;
		}
		
		$this->db->insert($this->my_table, $params); 
		
		$err=$this->db->error();
		
		if (!empty($err['code'])) {
			return false;
		}
		
		$insert_id=$this->db->insert_id();
		
		return $insert_id;
	}
}