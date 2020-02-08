<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends CI_Model {

	protected static $table = 'images';
	protected static $ci;

	public function __construct(){

		parent::__construct();
		self::$ci = get_instance();

	}

	public static function by_product($id){

		return self::$ci->db->select('images.img')
							->join('products', 'images.product_id = products.product_id')
						    ->get_where('images', ['products.product_id' => $id])
						    ->result();

	}

}