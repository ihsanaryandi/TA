<?php 


function totalProductsByCategory($category_id)
{

	$ci = get_instance();

	return count($ci->db->get_where('products', [
		'product_category' => $category_id,
		'product_stock !=' => 0
	])->result());

}

function totalProductsByBrand($brand_id)
{

	$ci = get_instance();

	return count($ci->db->get_where('products', [
		'product_brand' => $brand_id,
		'product_stock !=' => 0
	])->result());

}

?>