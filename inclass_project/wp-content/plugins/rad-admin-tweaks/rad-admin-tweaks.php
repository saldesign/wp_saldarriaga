<?php 

/*
Plugin Name: Rad Admin Tweaks
Plugin URI: http://wordpress.melissacabral.com
Description: Customizes the Login/register forms an admin panel
Author: Melissa Cabral
Version: 1.0
License: GPLv2
Author URI: http://melissacabral.com
*/



/**
 * custom CSS for the login/register form
 */
add_action('login_enqueue_scripts', 'rad_login_css');
function rad_login_css(){
	//Get Url of css file
	$url = plugins_url('rad-login.css', __FILE__);
	//enque it 
	wp_enqueue_style('rad-login-css', $url);
}

/**
 * Change behavior of the login logo link
 */

add_filter('login_headerurl', 'rad_login_href');
function rad_login_href(){
	return home_url();//any URL 
}
add_filter('login_headertitle','rad_login_title');
function rad_login_title(){
	return 'Go back to ' . get_bloginfo('name');
}

/**
 * Remove the WP node from the toolbar
 * @link https://codex.wordpress.org/Toolbar
 */

add_action('admin_bar_menu', 'rad_toolbar', 999);
function rad_toolbar($wp_admin_bar){
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->add_node(array(
			'id' => 'contact-me',
			'title' => '<span class="ab-icon dashicons dashicons-email"></span>Contact Christian',
			'href' => 'mailto:saldarriagadesign@gmail.com',
		));
}

/**
 * Customize the admin dashboard panels 
 */

add_action('wp_dashboard_setup', 'rad_dashboard');
function rad_dashboard(){
	//quickpress
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	//wordpress news
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );

	//custom help box
	wp_add_dashboard_widget('dashboard_help', 'Get Help', 'rad_widget_content');
}

function rad_widget_content(){
	echo '<p><iframe width="300" height="200" src="https://www.youtube.com/embed/-FHay-Lj0MA" frameborder="0" allowfullscreen></iframe></p>';
}

//no close php