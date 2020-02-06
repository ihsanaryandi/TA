<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Moonve extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('Products');
	}

	public function index()
	{
		$data['title'] = 'Online Shop';

		$data['products'] = Products::random();
		$data['new_products'] = Products::newProducts();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('moonve/index', $data);
		$this->load->view('templates/footer', $data);

	}

	public function cart()
	{
		request_method("patch");
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('moonve/cart');
		$this->load->view('templates/footer');

	}

	public function detail_product()
	{

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('moonve/product');
		$this->load->view('templates/footer');

	}


}
