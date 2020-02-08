<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Colors extends CI_Model {

	protected static $table = 'colors';
	protected static $ci;

	public function __construct(){

		parent::__construct();
		self::$ci = get_instance();

	}

	public static function by_product($id){

		return self::$ci->db->select('color, stock')
							->join('products', self::$table . '.product_id = products.product_id')
							->get_where(self::$table, [
								'products.product_id' => $id,
								self::$table . '.stock >' => 0
							])
							->result();

	}

	public static function stock($id){

		$stockAmount = 0;

		foreach(self::where_product($id) as $stock){

			$stockAmount += (int) $stock->stock;

		}

		return $stockAmount;

	}

}