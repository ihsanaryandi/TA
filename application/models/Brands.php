<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends CI_Model {

	protected static $table = 'brands';
	protected static $ci;


	public function __construct(){

		parent::__construct();
		self::$ci = get_instance();

	}

	public static function all()
	{
		return self::$ci->db->order_by('brand', 'ASC')
							->get(self::$table)
							->result();
	}

}
