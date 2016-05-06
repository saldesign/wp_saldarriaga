<?php 
/*
Plugin Name: Rad Simplest Widget
Description: A basic widget starting point for learning
Author: Christian Saldarriaga
license:GPLv3
 */

/**
 * Register Widget
 */

add_action('widgets_init', 'rad_simple_widget' );
function rad_simple_widget(){
	//capitalized because it's an object class
	register_widget('Rad_Simple_Widget');
}

class Rad_Simple_Widget extends WP_Widget{
	/**
	 * Constructor
	 * This sets up the name and class of the widget
	 */
	function __construct(){
		$widget_options = array(
			'classname'	=> 'widget_rad_simple',
			'description' => 'Describe your widget', 
		);

		//apply options 			ID Base 					  Title 					options
		parent::__construct('rad_simple_widget', 'Rad Simple Widget', $widget_options);
	}

	/**
	 * HTML output for the theme-side
	 * Required. function must be named widget
	 * @param array $args the arguments from register_sidebar()
	 * @param array $instance a list of settings from one instance of this widget
	 */
	function widget($args, $instance){
		//turn the array into many variables, php function
		extract($args);

		echo $before_widget; //usually a <div> or <section>
		//title of the widget should be filterable
		$title = apply_filters('widget_title', $instance['title'] );
		if(!empty($title)){
			echo $before_title;
			echo $instance['title'];
			echo $after_title;
		}
			?>

			<p>Any HTML or PHPizzle can go Hizzle.</p>

			<?php
		echo $after_widget;

	}
	/**
	 * Admin panel form fields
	 * @param  array $instance a list of settings from one instance of this widget
	 */
	function form( $instance ){
		$defaults = array('title' => 'Simplest Widget Title');
		$instance = wp_parse_args((array) $instance, $defaults);
		?>
			<p><label>
				Title:
				<input class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title'] ?>">
			</label></p>

		<?php
	}
	/**
	 * Sanitize and save
	 * @param  array $new_instance the new, dirty data from the form
	 * @param  arra $old_instance the previously saved & cleaned values
	 * @param  array - all of the cleaned fields
	 */
	function update( $new_instance, $old_instance){
		//sanitize each field
		
		$clean_instance['title'] = wp_filter_nohtml_kses($new_instance['title']);


		return $clean_instance;

	}
}