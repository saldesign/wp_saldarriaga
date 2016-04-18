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
	if(is_singular() && get_option('thread_comments') && comments_open()){
		wp_enqueue_script('comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'awesome_comment_ux' );


/**
 * Register two Menu Locations
 */
add_action( 'init', 'awesome_menu_locations' );
function awesome_menu_locations(){
	register_nav_menus( array(
		'main_menu' => 'Main Menu',
		'utilities' => 'Utility area at the top',
	) );
}
function awesome_menu_fallback(){
	echo 'Go in admin and assign a menu to the Main Menu!';
}

/**
 * Helper function to output pagination on any template
 */
function awesome_pagination(){
	?>
	<section class="pagination">
		<?php 
		if( is_singular() ){
			previous_post_link('%link', 'Older Post: %title'); 	//1 older post
			next_post_link('%link', 'Newer Post: %title' ); 		//1 newer post
		}
		//use newer numbered pagination if available (since 4.1)
		elseif( function_exists('the_posts_pagination') ){
			the_posts_pagination( array(
				'prev_text' => '&larr; Previous',
				'next_text' => 'Next &rarr;',
				'mid_size' => 2,
			) );
		}else{	
			previous_posts_link('&larr; Newer Posts'); 
		 	next_posts_link('Older Posts &rarr;'); 
		}
		 ?>
		</section>
	<?php 
}

/**
 * Create widget areas (dynamic sidebars)
 */
add_action('widgets_init', 'awesome_widget_areas');
function awesome_widget_areas(){
	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'blog-sidebar',
		'description' => 'Appears alongise blog posts and archives',
		'before_widget' => '<section id="%1$s" class="widget %1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar( array(
		'name' => 'Footer Area',
		'id' => 'footer-area',
		'description' => 'Appears at the bottom of the blog',
		'before_widget' => '<section id="%1$s" class="widget %1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar( array(
		'name' => 'Home Area',
		'id' => 'home-area',
		'description' => 'Appears on the front page',
		'before_widget' => '<section id="%1$s" class="widget %1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar( array(
		'name' => 'Image Bar',
		'id' => 'images',
		'description' => 'a bar of three images',
		'before_widget' => '<section id="%1$s" class="widget %1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}
//no close