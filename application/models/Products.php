<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Model {

	protected static $table = 'products';
	protected static $ci;

	public function __construct(){

		parent::__construct();
		self::$ci = get_instance();

	}

	public static function all(){

		return self::$ci->db->get(self::$table)->result();

	}

	public static function random(){

		return self::$ci->db->select('*')
							->from(self::$table)
							->join('categories', 'products.product_category = categories.id')
							->order_by('RAND()')
							->get()
							->result();

	}

	public static function newProducts(){

		return self::$ci->db->join('categories', 'products.product_category = categories.id')
							->order_by('products.id', 'DESC')
						    ->get(self::$table, 10)
						    ->result();

	}

}