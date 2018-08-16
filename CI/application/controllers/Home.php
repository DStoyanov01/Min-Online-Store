<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->model('Category_manager');
		$this->load->model('Product_manager');
		$this->load->helper('url_helper');
		$this->load->library('cart');
	}
	
	public function index()
	{
		$this->data['whole_tree'] = $this->Category_manager->getWholeTree();
		$this->data['controller'] = $this->router->fetch_class();
		$this->data['cart_total'] = number_format($this->cart->total(), 2, '.', ' ');
		$this->load->view('home', $this->data);
	}
}
