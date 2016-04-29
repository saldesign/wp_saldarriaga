<?php
/*
Plugin Name: Rad Slider
Plugin URI: http://wordpress.melissacabral.com
Description: Adds a Slider based on Custom Post Types
Author: Melissa Cabral
Version: 1.0
License: GPLv2
Author URI: http://melissacabral.com
*/

/**
 * Register a Custom Post Type (Slide) 
 * Since ver. 1.0
 */
add_action('init', 'slide_init');
function slide_init() {
	$args = array(
		'labels' => array(
			'name' => 'Slides', 
			'singular_name' => 'Slide', 
			'add_new' => 'Add New', 'slide',
			'add_new_item' => 'Add New Slide',
			'edit_item' => 'Edit Slide',
			'new_item' => 'New Slide',
			'view_item' => 'View Slide',
			'search_items' => 'Search Slides',
			'not_found' => 'No slides found',
			'not_found_in_trash' => 'No slides found in Trash', 
			'parent_item_colon' => '',
			'menu_name' => 'Slides'
		),
		'public' => true,
		'exclude_from_search' => true,
		'show_in_menu' => true, 
		'rewrite' => true,
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => 20,
		'menu_icon'			=> 'dashicons-slides',
		'supports' => array('title', 'editor', 'thumbnail')
	); 
	register_post_type('slide', $args);
}

/**
 * Put  little help box at the top of the editor 
 * Since ver 1.0
 */
add_action('contextual_help', 'slide_help_text', 10, 3);
function slide_help_text($contextual_help, $screen_id, $screen) {
	if ('slide' == $screen->id) {
		$contextual_help ='<p>Things to remember when adding a slide:</p>
		<ul>
		<li>Give the slide a title. The title will be used as the slide\'s headline</li>
		<li>Attach a Featured Image to give the slide its background</li>
		<li>Enter text into the Visual or HTML area. The text will appear within each slide during transitions</li>
		</ul>';
	}
	elseif ('edit-slide' == $screen->id) {
		$contextual_help = '<p>A list of all slides appears below. To edit a slide, click on the slide\'s title</p>';
	}
	return $contextual_help;
}


/**
 * This prevents 404 errors when viewing our custom post archives
 * always do this whenever introducing a new post type or taxonomy
 * Since ver 1.0
 */
function rad_slider_rewrite_flush(){
	slide_init();
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'rad_slider_rewrite_flush');

/**
* Add the image size for the slider 
* Since ver 1.0
*/
function rad_slider_image(){
	add_image_size( 'rad-slider', 1120, 330, true );	
}
add_action('init', 'rad_slider_image');


/**
 * Template tag to display the HTML of the slideshow.
 * @return mixed HTML output
 */
function rad_slider(){
	//get five slides
	$slide_query = new WP_Query(array(
			'post_type' => 'slide', 
			'posts_per_page' => 5, 
		));
	if($slide_query -> have_posts()){

	?>
	<section id="rad-slider">
		<ul class="slides">
		<?php while($slide_query -> have_posts()){
				$slide_query->the_post();
			?>
			<li>
				<?php the_post_thumbnail('rad-slider' ); ?>
				<div class="slide-details">
					<h2><?php the_title( ); ?></h2>
					<p><?php the_excerpt(); ?></p>
				</div>
			</li>
		<?php } ?>
		</ul>
	</section>
	<?php 
	}//end if there are slides
	//clean up after custom query
	wp_reset_postdata();
}
add_action('wp_enqueue_scripts', 'rad_slider_scripts');
function rad_slider_scripts(){
	//attach jq
	wp_enqueue_script('jquery' );
	//attach responsive slides
	$rs_url = plugins_url('js/responsiveslides.js', __FILE__);
	//								handle 			 url 		dependancies     ver 	in footer
	wp_enqueue_script('responsiveslides', $rs_url, array('jquery'), '1.54', true );
	//attach our custom js
	$custom_url = plugins_url('js/custom.js', __FILE__);
	wp_enqueue_script('rad-custom', $custom_url, array( 'responsiveslides'), '0.1', true);
	//attach the stylesheet
	$style_url = plugins_url('css/style.css',__FILE__);
	wp_enqueue_style('rad_slider-style', $style_url );
}



//don't close that shit


