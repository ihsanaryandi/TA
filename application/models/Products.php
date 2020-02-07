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

		return self::$ci->db->join('categories', self::$table . '.product_category = categories.id')
							->join('images', self::$table . '.id = images.id')
							->order_by('RAND()')
							->get_where(self::$table, [self::$table . '.product_stock >' => 0])
							->result();

	}

	public static function newProducts(){

		return self::$ci->db->join('categories', self::$table . '.product_category = categories.id')
							->join('images', self::$table . '.id = images.id')
							->order_by(self::$table . '.id', 'DESC')
						    ->get(self::$table, 10)
						    ->result();

	}

	public static function single($product_id){

		return self::$ci->db->join('categories', self::$table . '.product_category = categories.id')
							->join('seller', self::$table . '.seller_id = seller.id')
							->get_where(self::$table, [self::$table . '.id' => $product_id])
							->row();

	} 

	public static function related($category_id, $product_id){

		return self::$ci->db->join('categories', self::$table . '.product_category = categories.id')
							->join('images', self::$table . '.id = images.id')
							->order_by('RAND()')
							->get_where(self::$table, [
								'categories.id' => $category_id,
								self::$table . '.product_stock >' => 0,
								self::$table . '.id !=' => $product_id
							], 8)
							->result();

	}

	public static function by_seller($seller_id, $product_id){

		return self::$ci->db->join('seller', self::$table . '.seller_id = seller.id')
							->join('categories', self::$table . '.product_category = categories.id')
							->join('images', self::$table . '.id = images.id')
							->order_by('RAND()')
							->get_where(self::$table, [
								'seller.id' => $seller_id,
								self::$table . '.product_stock >' => 0,
								self::$table . '.id !=' => $product_id
							], 8)
							->result();

	}

}