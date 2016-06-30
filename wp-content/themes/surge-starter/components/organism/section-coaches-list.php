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

			    $type = wp_get_post_terms(get_the_id(), 'type', array("fields" => "names"));
					//debug($type);
			    ?>
			    
		<div class="col-xs-12 col-md-6 bg_white coach">
			<div class="item">
				<?php 
					switch ($type[0]) {
						case 'Speaker':
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
							break;
						case 'Coach':
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
						                            						"extra-data" => "data-toggle='modal' data-target='#coach".get_the_id()."'",
																										"class" => 'btn text-uppercase pull-left',
																										"text" => "Find Out More",
																										"link" => "",
																												
						                            ]),
						                        "side_image" => get_field("main_image"),
						                        "image_position" => "Left Side",
						                        "img_class" => "col-xs-12 col-sm-5"
						                        ]
						                   ]);?>

														  <!-- Modal -->
								<div class="modal fade" id="coach<?php echo get_the_id() ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								   <div class="modal-header">
								      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								   </div>
								      <div class="modal-body">
								        <?php  get_component([ 'template' => 'molecule/card',
						                   "remove_elements"=>['h6'],
						                  	'vars' => [
						                        "class" => 'coach-modal',
						                        "title" => get_the_title(),
						                        "image" => get_field("main_image"),
						                        "content" => get_field("full_bio"),
						                        "button" => array([
						                            						"extra-data" => "data-dismiss='modal' aria-label='Close'",
																										"class" => 'btn text-uppercase',
																										"text" => "Close",
																										"link" => "",
																												
						                            ])
						                        ]
						                   ]);?>
								      </div>
								      <!-- <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								        <button type="button" class="btn btn-primary">Save changes</button>
								      </div> -->
								    </div>
								  </div>
								</div>
	<?php				break;
						default:
							# code...
							break;
					}
					
					
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