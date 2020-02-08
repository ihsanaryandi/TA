<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Model {

	protected static $table = 'categories';
	protected static $ci;

	public function __construct()
	{
		self::$ci = get_instance();
	}


	public static function all()
	{
		return self::$ci->db->order_by('category', 'ASC')->get(self::$table)->result();
	}

	public static function random()
	{
		return self::$ci->db->order_by('RAND()')
							->get(self::$table, 8)
							->result();
	}

}