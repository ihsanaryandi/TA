<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function not_found(){

		$data['heading'] = 'Page Not Found';
		$data['message'] = '
			<p>The page that you requested is not found<p>
			<a href="' . base_url('moonve') . '">Go Back</a>
		';
		$this->load->view('errors/html/error_404', $data);

	}

}
