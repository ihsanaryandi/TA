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

		return self::$ci->db->join('categories', self::$table . '.product_category = categories.category_id')
							->join('images', self::$table . '.product_id = images.product_id')
							->order_by('RAND()')
							->get_where(self::$table, [self::$table . '.product_stock >' => 0])
							->result();

	}

	public static function newProducts(){

		return self::$ci->db->join('categories', self::$table . '.product_category = categories.category_id')
							->join('images', self::$table . '.product_id = images.product_id')
							->order_by(self::$table . '.product_id', 'DESC')
						    ->get(self::$table, 10)
						    ->result();

	}

	public static function single($product_id){

		return self::$ci->db->join('categories', self::$table . '.product_category = categories.category_id')
							->join('seller', self::$table . '.seller_id = seller.seller_id')
							->get_where(self::$table, [self::$table . '.product_id' => $product_id])
							->row();

	} 

	public static function related($category_id, $product_id){

		return self::$ci->db->join('categories', self::$table . '.product_category = categories.category_id')
							->join('images', self::$table . '.product_id = images.product_id')
							->order_by('RAND()')
							->get_where(self::$table, [
								'categories.category_id' => $category_id,
								self::$table . '.product_stock >' => 0,
								self::$table . '.product_id !=' => $product_id
							], 8)
							->result();

	}

	public static function by_seller($seller_id, $product_id){

		return self::$ci->db->join('seller', self::$table . '.seller_id = seller.seller_id')
							->join('categories', self::$table . '.product_category = categories.category_id')
							->join('images', self::$table . '.product_id = images.product_id')
							->order_by('RAND()')
							->get_where(self::$table, [
								'seller.seller_id' => $seller_id,
								self::$table . '.product_stock >' => 0,
								self::$table . '.product_id !=' => $product_id
							], 8)
							->result();

	}

	public static function total_by_category(){

		return self::$ci->db->join('categories', self::$table . '.product_category = categories.category_id')
							->get(self::$table)
							->result();

	}

}