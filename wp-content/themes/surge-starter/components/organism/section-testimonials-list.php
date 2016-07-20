<?php //debug($vars['element'][0]) ?>
<?php $options = $vars["padding"].' '.$vars["background_color"].' '.$vars["margin"].' '.$vars['section_width']?>
<section id="<?php echo $vars["id"]?>" class="section-testimonials-list <?php echo $options ?>" style="background-image: url('<?php echo $vars['background_image'] ?>');">
	   <?php
		  // debug($vars);
		  // WP_Query arguments
			$testimonials=$vars['websites_testimonials'];
			// debug($testimonials);
			$args = array (
			  "post_type" => "testimonial",
			  "post__in" => $testimonials,
			  "orderby" => "post__in",
			  'posts_per_page' => -1,
			);
	
			// The Query
			$query = new WP_Query( $args );
			// debug($query);
			// The Loop
			if ( $query->have_posts() ) {
			  while ( $query->have_posts() ) {
			    $query->the_post();
			    	// debug(get_the_id());
              get_component([
                'template' => 'molecule/img-text',
                 'vars' => [
                      'class' => 'item active text-center container padding-5',
                      'title' =>   get_the_title(),
                      'content' => get_the_content(),
                      'img' => get_field('main_image')
                      ]
                    ]);
            }
          } else {
            // no posts found
          }
			// Restore original Post Data
			wp_reset_postdata();
			    ?>
</section>