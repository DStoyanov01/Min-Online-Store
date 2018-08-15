<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Category_manager');
		$this->load->helper('url_helper');
		$this->load->library('cart');
	}
	
	public function index()
	{
		
		$this->data['controller'] = $this->router->fetch_class();
		$this->data['whole_tree'] = $this->Category_manager->getWholeTree();
		$this->data['cart_total'] = number_format($this->cart->total(), 2, '.', ' ');
		
		$this->load->view('about', $this->data);
	}
}
