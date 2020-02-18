<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Moonve extends CI_Controller {

	protected $categories;

	public function __construct()
	{

		parent::__construct();
		$this->load->model('Products');
		$this->load->model('Categories');
		$this->load->model('Images');
		$this->load->model('Colors');
		$this->load->model('Specifications');
		$this->load->model('Brands');

		$this->categories = Categories::random();
	}

	public function index()
	{
		$data['title'] = 'Online Shop';
		$data['products'] = Products::random();
		$data['new_products'] = Products::newProducts();
		$data['categories'] = $this->categories;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/login_modal', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('moonve/index', $data);
		$this->load->view('templates/footer', $data);

	}

	public function cart()
	{
		request_method("patch");
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('moonve/cart');
		$this->load->view('templates/footer');

	}

	public function products()
	{
		$data['title'] = 'E-Commerce - All Products';
		$data['categories'] = $this->categories;
		$data['categories_aside'] = Categories::all();
		$data['products'] = Products::random();
		$data['brands'] = Brands::all();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/login_modal', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('moonve/products', $data);
		$this->load->view('templates/footer', $data);
	}

	public function detail($id = null)
	{	
		if(!$id){
			redirect('errors/not_found');
			exit;
		}

		$data['product'] = Products::single($id);

		if(!$data['product']){
			redirect('errors/not_found');
			exit;
		}

		$data['title'] = $data['product']->product_name;
		$data['categories'] = $this->categories;
		$data['images'] = Images::by_product($id);
		$data['colors'] = Colors::by_product($id);
		$data['specs'] = Specifications::by_product($id);
		$data['related_products'] = Products::related($data['product']->product_category, $data['product']->product_id);
		$data['seller_products'] = Products::by_seller($data['product']->seller_id, $data['product']->product_id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('moonve/product', $data);
		$this->load->view('templates/footer', $data);

	}

	public function getProducts()
	{

		request_method('POST');

		$data = json_decode(file_get_contents("php://input"));

		$products = $this->db->select('products.product_id, product_name, product_price, img, category')
							 ->from('products')
							 ->join('brands', 'brand_id = product_brand')
							 ->join('categories', 'category_id = product_category')
							 ->join('images', 'images.product_id = products.product_id')
							 ->like('product_name', $data->search)
							 ->like('category', $data->category)
							 ->like('brand', $data->brand)
							 ->where('product_price >=', $data->price)
							 ->order_by('product_price', 'ASC')
							 ->get()
							 ->result();

		echo json_encode($products);

	}

}
