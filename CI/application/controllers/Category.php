<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Category_manager');
		$this->load->helper('url_helper');
	}

	public function index(){
		
		$data['categories'] = $this->Category_manager->get_all();
		$data['main_categories'] = $this->Category_manager->getByParentId(0);
		$data['drehi'] = $this->Category_manager->getByParentId(1);
		$data['chanti'] = $this->Category_manager->getByParentId(2);
		$data['secondary_categories'] = $this->Category_manager->getSecondaryCategories();
		$data['title'] = 'Categories archive';

		$this->load->view('categories', $data);
	}
	
	function add(){
		
		$data['base_categories'] = $this->Category_manager->getByParentId(0);
		// echo'<pre>';
		// var_dump($data['base_categories']);
		// echo'<pre>';
		// exit();
		$this->load->view('add_category', $data);
	}
	
	public function insertOne(){
		
		// echo'<pre>';
		// print_r($_POST);
		// echo'<pre>';
		// exit();
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('parent_id', 'Parent id', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->add();
			// $this->load->view('add_category');
		}
		else
		{
			$id = $this->Category_manager->insertOne($_POST);
			
			if($id != false){
				// success
				$this->load->view('form_success');
			}else{
				// fail
				$this->load->view('add_category');
			}
		}
	}
	
	public function mycategory($cat=1){
		
		$data['cat_list'] = $this->Category_manager->getByParentId($cat);
		
		$this->load->view('cat_view', $data);
	}
}