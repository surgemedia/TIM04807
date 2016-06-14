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

	/*============================================
	=          Programs - Post Type           	 =
	============================================*/
	$program = new CPT([
	    'post_type_name' => 'program',
	]);
	$program->menu_icon("dashicons-layout");
?>