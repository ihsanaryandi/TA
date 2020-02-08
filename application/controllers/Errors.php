<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function not_found(){

		$data['heading'] = '404';
		$data['message'] = 'The page you requested was not found.';
		
		$this->load->view('errors/html/error_404', $data);

	}

}
