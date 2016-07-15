<?php while (have_posts()) : the_post(); ?>
<?php 
		
			$vars['builder'] = get_field('layout',get_id_from_slug('newsblog'));
			
			foreach ($vars['builder'] as $key => $value) {
				if($value['acf_fc_layout'] == 'section-related-items'){					
					$position=array_search(get_the_id(), $value['website_items']);
					$size=sizeof($value['website_items']);
					$args = array (
					  "post_type" => "any",
					  "post__in" => $value['website_items'],
					  "orderby" => "post__in"
					);
					// The Query
					$query = new WP_Query( $args );
					$count=0;
					// T	he Loop
					if ( $query->have_posts() ) {
					  while ( $query->have_posts() ) {
					    $query->the_post();
					    $website_links[$count] = get_permalink();
					    $count++;
					  }
					} 

					wp_reset_postdata();

					if($size>1){
						switch ($position) {
							case 0:
								$button= array(
														array('class'=> "center",
																	'text' => "View all",
																	'link' => "newsblog",
														 ),
														array('class'=> "previous hid",
																	'text' => "",
																	'link' => "",
															),
														array('class'=> "next",
																	'text' => "Next",
																	'link' => $website_links[1],
															),
												 );
								break;
							case $size-1:
								$button= array(
														array('class'=> "center",
																	'text' => "View all",
																	'link' => "newsblog",
														 ),
														array('class'=> "previous",
																	'text' => "Previous",
																	'link' => $website_links[0],
															),
														array('class'=> "next hid",
																	'text' => "",
																	'link' => "",
															),
												 );
							break;

							default:
								$button= array(
														array('class'=> "center",
																	'text' => "View all",
																	'link' => "newsblog",
														 ),
														array('class'=> "previous",
																	'text' => "Previous",
																	'link' => $website_links[$position-1],
															),
														array('class'=> "next",
																	'text' => "Next",
																	'link' => $website_links[$position+1],
															),
												 );
								break;
						}
					}
				}
			}
			

$vars = array(
	'title' => get_the_title(),
	'content' => get_the_content(),
	'large_image' => get_field('large_image')
	);

 ?>

<section class="jumbotron-text bg-cover clear padding-6"  style="background-image:url(<?php echo $vars['large_image']?>)">
	<div class="container">
	<?php
			//debug($vars);
			/*=============================================
			= Card (Class,Image,Title,Content)
			= @components
				+ molecule/card
			=============================================*/
			get_component([ 'template' => 'molecule/text-subtitle-content',
											'remove_tags'=>['p','h6'],
											'vars' => [
														"class" => '',
														"title" => $vars['title'],
														]
											 ]);
	?>
	</div>
</section>

<section id="" class="section-col-12-n1 padding-6">
 <div class="container">
 	<?php
			//debug($vars);
			/*=============================================
			= Card (Class,Image,Title,Content)
			= @components
				+ molecule/card
			=============================================*/
			get_component([ 'template' => 'molecule/card',
											'remove_tags'=>['h6','h1'],
											'vars' => [
														"class" => 'posts',
														"content" => apply_filters('the_content',  $vars["content"]),
														"button" => $button,
														]
											 ]);
?>

 </div>
</section>

<?php $vars['front_page'] =  get_option('page_on_front');
			$vars['builder'] = get_field('layout',$vars['front_page']);
			for ($vars['i']=0; $vars['i'] < sizeof($vars['builder']); $vars['i']++) { 
				if($vars['builder'][$vars['i']]['acf_fc_layout'] == 'section-2row-website-grid' && isset($vars['program_section']) != true){					
					$vars['program_section'] = $vars['builder'][$vars['i']];
				}
			}

	if(isset($vars['program_section']) == true){
	get_component([ 'template' => 'organism/section-2row-website-grid',
											'vars' => [
														"title" => $vars['program_section']['title'],
														"background_image" => $vars['program_section']['background_image'],
														"background_color" => $vars['program_section']['background_color'],
														"first_row" => $vars['program_section']['first_row'],
														"second_row" => $vars['program_section']['second_row'],
														"section_width" => 'container-fluid',
														"id" => "section-2row-website-grid",
														"padding" => 'padding-6',
														]
											 ]);
	}

 ?>
<?php endwhile; ?>

