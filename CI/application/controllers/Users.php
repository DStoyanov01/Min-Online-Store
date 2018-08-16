<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Users_manager');
		$this->load->helper('url_helper');
	}

	public function index(){
		
		$data['users'] = $this->Users_manager->get_users();
		$data['title'] = 'User archive';

		$this->load->view('users', $data);
	}

	public function view($slug = NULL){
		$data['users'] = $this->users_manager->get_users($slug);
	}
}