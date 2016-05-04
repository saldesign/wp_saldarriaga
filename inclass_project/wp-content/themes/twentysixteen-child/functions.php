<?php 
/**
 * Child theme functions run before the parent theme's
 * Use this file to add, remove or modify parent functionality
 */


/**
 * Enqueue the parents stylesheet
 */

add_action('wp_enqueue_scripts','child_styles' );
function child_styles(){
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css' );
}

/**
 * Add Widget Area for the footer
 */
add_action('widgets_init' , 'child_widget_areas', 999);
function child_widget_areas(){
	register_sidebar(array(
		'name'	=> 'Child Footer Area',
		'id'		=> 'child-footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	));
}

 ?>