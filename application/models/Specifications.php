<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Specifications extends CI_Model {

	protected static $table = 'specifications';
	protected static $ci;

	public function __construct(){

		parent::__construct();
		self::$ci = get_instance();

	}

	public static function by_product($id){

		return self::$ci->db->select('spec')
							->join('products', self::$table . '.product_id = products.product_id')
							->get_where(self::$table, ['products.product_id' => $id])
							->result();

	}

}