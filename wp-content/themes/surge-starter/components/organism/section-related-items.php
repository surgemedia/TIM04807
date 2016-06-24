<?php //debug($vars['element'][0]) ?>
<section class="section-related-items bg-cover" style="background-image: url(<?php echo $vars['image']?>);">
	<div class="container">
	<?php
		$element_file = $vars['element'][0]['acf_fc_layout']; //get file
		unset($vars['element'][0]['acf_fc_layout']); // remove file from array leveling only vars
		$vars['element'][0]['class'] = 'col-md-12'; //because i know this from the file name
		$element_vars = $vars['element'][0];
		get_component([
		 'template' => 'molecule/'.$element_file,
		 'remove_tags' => $vars['element'][0]['remove_elements'],
		 'vars' => $element_vars
				]);
		unset($element_file);
		unset($element_vars);
	 ?>
		<!-- <div class="wrapper"> -->
	   <?php

			  // WP_Query arguments
			$args = array (
			  "post_type" => "any",
			  "post__in" => $vars['website_items']
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
			  while ( $query->have_posts() ) {
			    $query->the_post();
			     /*=============================================
			      = Card (Class,Image,Title,Content)
			      = @components
			        + molecule/card
			      =============================================*/
			      get_component([ 'template' => 'molecule/card-img-side',
			                      'remove_tags'=>$vars['remove_elements'],
			                      'vars' => [
			                            "class" => 'col-md-6 coach',
			                            "title" => get_the_title(),
			                            "image" => get_field("image"),
			                            "content" => get_the_content(),
			                            "button" => array([
			                                
																				"class" => 'btn text-uppercase pull-left',
																				"text" => "Read More",
																				"url" => get_permalink()
																						
			                                ]),
			                            "side_image" => get_field("side_image"),
			                            "image_position" => "Right Side"
			                            ]
			                       ]);
			  }
			} else {
			  // no posts found
			}

			// Restore original Post Data
			wp_reset_postdata();
			    ?>
	  <!-- </div> -->
	</div>
</section>