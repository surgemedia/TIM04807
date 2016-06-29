<?php //debug($vars['element'][0]) ?>
<section class="padding-6 container-fluid">
	   <?php
	
			  // WP_Query arguments
			$args = array (
			  "post_type" => "any",
			  "post__in" => $vars['website_items'],
			  "orderby" => "post__in"
			);
	
			// The Query
			$query = new WP_Query( $args );
	
			// The Loop
			if ( $query->have_posts() ) {
			  while ( $query->have_posts() ) {
			    $query->the_post();
debug(get_the_terms( get_the_id()))
			    ?>
			    
		<div class="col-xs-12 col-md-6 bg_white coach">
			<div class="item">
				<?php 

					
					/*=============================================
				  = Card (Class,Image,Title,Content)
				  = @components
				    + molecule/card
				  =============================================*/
				  get_component([ 'template' => 'molecule/card-img-side',
				                  'vars' => [
				                        'remove_elements'=>['img','h6'],
				                        "class" => 'col-xs-12 col-sm-7 style-2',
				                        "title" => get_the_title(),
				                        "image" => get_field("image"),
				                        "content" => truncate(get_field("short_bio"),20,"..."),
				                        "button" => array([
				                            
																								"class" => 'btn text-uppercase pull-left',
																								"text" => "Find Out More",
																								"link" => get_permalink()
																										
				                            ]),
				                        "side_image" => get_field("main_image"),
				                        "image_position" => "Left Side",
				                        "img_class" => "col-xs-12 col-sm-5"
				                        ]
				                   ]);
				                   ?>
				</div>
			</div>
			<?php  }
			} else {
			  // no posts found
			}
	
			// Restore original Post Data
			wp_reset_postdata();
			    ?>
</section>