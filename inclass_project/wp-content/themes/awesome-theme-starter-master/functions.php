<?php 
//Use this file to activate or create any functionality that's related to look & Feel
//Wordpress will automatically load it before all template files

//activate "sleeping features"
	// turns on featured image
	add_theme_support('post-thumbnails');

	// allows you to personalize styles for post types
	add_theme_support('post-formats', array('quote', 'image', 'gallery', 'video', 'link', 'audio', 'chat', 'status', 'aside',  ) );

	//background customizer
	add_theme_support('custom-background' );

	//logo uploader
	add_theme_support('custom-logo', array(
		'height' => 80,
		'width' => 324,
		'flex-height' => false,
		'flex-width' => false, ) );
	//rss feed support
	add_theme_support('automatic-feed-links' );

	//html5 support
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

	//dont forget to remove the <title> tag from header.php
	add_theme_support('title-tag' );

	//special image size for the front page banner
	//						name 			  w    h   crop?
	add_image_size( 'big-banner', 1050, 300, true );


/**
 * Make Excerpts Better!
 *	Change default length and [...]
 */
function awesome_ex_length(){
	return 50;//words
}
add_filter('excerpt_length', 'awesome_ex_length' );
/**
 * fix the [...]
 *	@param string $dots the original [...]
 *	@return string 		nice HTML button that links to the single post
 */
function awesome_readmore($dots){
	return '&hellip; <a class="readmore" href="' . get_permalink() . '"> Read More</a>';
}
add_filter('excerpt_more', 'awesome_readmore' );


/**
 * Make threaded comment replies more user friendly
 */
function awesome_comment_ux(){
	if(is_singular( )){
		wp_enqueue_script('comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'awesome_comment_ux' );
//no close