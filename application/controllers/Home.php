<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model', 'home');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['title'] 	= 'Home';
		$data['weddings']		= $this->home->getAllProduct();
		$data['page']		= 'pages/home/index';
		$this->load->view('layouts/app', $data);
	}

	public function detail($id)
	{
		$data['title'] = 'Detail Product';
		$data['wedding']	= $this->home->getProductById($id);
		$data['page']	= 'pages/home/detail';
		$this->load->view('layouts/app', $data);
	}

}

/* End of file Home.php */
