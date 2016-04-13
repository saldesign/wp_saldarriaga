<?php 
//Use this file to activate or create any functionality that's related to look & Feel
//Wordpress will automatically load it before all template files

//activate "sleeping features"
	// turns on featured image
	add_theme_support('post-thumbnails');

	//special image size for the front page banner
	//						name 			  w    h   crop?
	add_image_size( 'big-banner', 1050, 300, true );




//no close