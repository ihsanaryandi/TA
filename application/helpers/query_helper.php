<?php 


function totalProductsByCategory($category_id)
{

	$ci = get_instance();

	return count($ci->db->get_where('products', ['product_category' => $category_id])->result());

}

?>