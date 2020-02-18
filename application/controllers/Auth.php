<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function register(){

		$data['title'] = 'E-commerce - Register';
		$data['dontShow'] = true;
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('auth/register');
		$this->load->view('templates/footer');

	}

}
