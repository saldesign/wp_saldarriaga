<?php 

/*
Plugin Name: Rad Post Types
Description: Adds the "products" post type for the shop section
Author: Christian Saldarriaga
Author URI:csaldesign.com
License: GPLv3
Version: 0.1
 */

/**
 * Create the post type
 */
add_action('init', 'rad_register_cpt');
function rad_register_cpt(){
	register_post_type('product', array(
			'public' => true, //so users can see products
			'has_archive' => true, //all products on one page
			'menu_position' => 5,
			'menu_icon' => 'dashicons-cart',
			'supports' => array(
					'title', 'editor', 'thumbnail', 'custom-fields', 'revisions', 'excerpt'
				),
			'labels' => array(
					'name' => 'Products',
					'singular_name' => 'Product',
					'not_found' => 'No Products Found',
					'add_new_item' => 'Add New Product', 
					// 'menu_name' => 'shop'
				),
		) );
}




// no php close