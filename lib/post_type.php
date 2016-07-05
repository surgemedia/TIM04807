 <?php
 	/*============================================
	=          Testimonial - Post Type           =
	============================================*/
	$testimonial = new CPT([
	    'post_type_name' => 'testimonial',
	]);
	$testimonial->menu_icon("dashicons-format-quote");

	/*============================================
	=          Coaches - Post Type               =
	============================================*/
	$coach = new CPT([
	    'post_type_name' => 'coach',
	    'plural' => 'Coaches'

	]);
	$coach->menu_icon("dashicons-groups");
	$coach->register_taxonomy('type');
	/*============================================
	=          Programs - Post Type           	 =
	============================================*/
	$program = new CPT([
	    'post_type_name' => 'program',
	]);

	$program->menu_icon("dashicons-layout");


/*=======================================
=            Remove Supports            =
=======================================*/
function custom_remove_post_type_support() {		
	remove_post_type_support( 'coach', 'editor' );
};
add_action( 'init', 'custom_remove_post_type_support' );
?>