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
					'search_items' => 'Search Products',
					// 'menu_name' => 'shop'
				),
		) );
	//Register the "brand" taxonomy
	register_taxonomy('brand', 'product' , array(
			'hierarchical' => true,
			'show_admin_column' => true,
			'labels' => array(
					'name' => 'Brands',
					'singular_name' => 'Brand',
					'add_new_item' => 'Add Brand',
					'search_items' => 'Search Brands',
					'not_found' => 'No categories found'
				),
		));
	//Register the "dietarypref" taxonomy
	register_taxonomy('dietarypref', 'product' , array(
			'hierarchical' => true,
			'show_admin_column' => true,
			'labels' => array(
					'name' => 'Dietary Preferences',
					'singular_name' => 'Dietary Preference',
					'add_new_item' => 'Add Preference',
					'search_items' => 'Search Dietary Preferences',
					'not_found' => 'No Preferences found'
				),
		));
}

/**
 * Flush permalinks when this plugin is activated
 * Prevent 404 errors when viewing CPTs
 */

function rad_flush(){
	rad_register_cpt();
	flush_rewrite_rules( );
}
register_activation_hook(__FILE__, 'rad_flush' );

// no php close