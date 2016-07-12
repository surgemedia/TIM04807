<?php while (have_posts()) : the_post(); ?>
<?php 

$vars = array(
	'title' => get_field('title'),
	'subtitle' => get_field('subtitle'),
	'paragraphs' => get_field('paragraphs'),
	'paragraphs_size' => sizeof(get_field('paragraphs')),
	'form' => get_field('form'),
	'form_footer' => get_field('form_footer'),
	'bottom_title' => get_field('bottom_title'),
	'bottom_textarea' => get_field('bottom_textarea'),
	'background_image' => get_field('background_image'),
	'bg_color' => 'bg-'.get_field('color'),
	'font_color' => 'font-'.get_field('color'),
	'form' => get_field('form'),
	'is_series' => get_field('is_this_a_series'),
	'series_paragraph' => get_field('series_paragraph'),
	'series_sections' => get_field('series_sections'),
	);

 ?>

<section id="program-details" class="padding-6 container-fluid" style="background-image:url(<?php  echo $vars['background_image']; ?>)">
	
	<div class=" col-md-12 col-lg-10 col-lg-offset-1">
	<div class="col-md-9 col-xs-12 overlay">
		
<?php 
		function get_program_related($related_items, $parent_id, $current_id){
			array_unshift($related_items,$parent_id);
			$position=array_search($current_id,$related_items);
			
			$args = array (
			  "post_type" => "program",
			  "post__in" => $related_items,
			  "orderby" => "post__in"
			);
			// query
			$the_query = new WP_Query( $args );
			$count=0;
			?>
			<?php if( $the_query->have_posts() ): ?>
				<ul class="subprograms list-inline">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<li class="<?php echo ($count===$position)? 'active' : ''?> bg-<?php echo get_field("color");?> font-<?php echo get_field("color");?>"> 
						<a href="<?php the_permalink(); ?>">
							<?php echo get_field("subprogram_title") ?>
						</a>
					</li>
					<?php $count++; ?>
				<?php endwhile; ?>
				</ul>
			<?php endif; 

			 wp_reset_query();	

		}?>

<?php

	if (!empty(get_field("related_items"))) {
		get_program_related(get_field("related_items"), get_the_id(),get_the_id());
	}else{
				$current_id=get_the_id();
				// args
					$args = array(
						// 'numberposts' => 1,
						'post_type'		=> 'program',
						"meta_key" => "related_items",
						'meta_query'	=> array(
									array(
										'key'	 	=> 'related_items',
										'value'	 => 0,
										'compare' 	=> '!=',
									),
						)
					);
				// query
				$the_query = new WP_Query( $args );
				if( $the_query->have_posts() ):
					while ( $the_query->have_posts() ) : $the_query->the_post();
						
						if(!empty(get_field("related_items")) && in_array($current_id,get_field("related_items"))){
							get_program_related(get_field("related_items"), get_the_id(),$current_id);
						}else{

								//Nothing
							}

					 endwhile; 
				endif;
	}
				 wp_reset_query();	
					?>

		<hgroup class="col-md-12">
			<a class="viewall" href="#section-2row-website-grid">View All Programs</a>
			<h6><?php echo $vars['subtitle']; ?></h6>
			<h1><?php echo $vars['title']; ?></h1>
		</hgroup>

		<?php 
		if("yes" != $vars['is_series']){ 
			for ($vars['i']=0; $vars['i'] < $vars['paragraphs_size']; $vars['i']++) { 
								$remove_tags = ['img','h6'];
								if(strlen($vars['paragraphs'][$vars['i']]['title']) <= 0){
									$remove_tags = ['img','h6','h1'];
							}
				 			get_component([ 'template' => 'molecule/card',
												'remove_tags'=> $remove_tags,
												'vars' => [
															"class" => 'col-md-4 paragraph '.$vars['font_color'],
															"title" => $vars['paragraphs'][$vars['i']]['title'],
															"content" => apply_filters('the_content',  $vars['paragraphs'][$vars['i']]["content"]),
															"button" => [],
															]
												 ]);
			}
		}else	{?>
			<div class="col-xs-12 paragraph">
				<?php echo apply_filters('the_content',  $vars["series_paragraph"]); ?>
			</div>
	<?php	}
	 ?>
	</div>

	<div class="form-col pull-right <?php echo $vars['bg_color']; ?>">
	<?php 
	get_component([ 'template' => 'molecule/card',
											'remove_tags' =>  ['h6','p'],
											'vars' => [
														"class" => 'title',
														"title" => 'BOOK THIS PROGRAM',
														"button" => []
														]
											 ]);
		get_component([ 'template' => 'molecule/form',
											'remove_tags' =>  ['h2','h6','p'],
											'vars' => [
														"class" => 'form text-center',
														"form" => $vars["form"],
														]
											 ]);
		?>
	</div>
		<footer class="col-md-9 col-xs-12 pull-left <?php echo $vars['bg_color']; ?>">
			<h3 class="col-md-4"><?php echo $vars['bottom_title']; ?></h3>
			<div class="col-md-8"><?php echo $vars['bottom_textarea']; ?></div>
		</footer>
	</div>
</section>

<?php if("yes" != $vars['is_series']){ ?>
<section id="program-content" class="bg-grey padding-5">
	<div class="col-xs-12 col-md-8 col-md-offset-2">
		<?php the_content(); ?>
	</div>
</section>
<?php }else{?>
<section id="program-content" class="bg-grey padding-5">
	<div class="col-md-8 col-md-offset-2">
		<?php foreach ($vars['series_sections'] as $item) {?>
					<article class='program-series container-fluid'>
						<div class="col-sm-3">
							<div class="circle <?php echo $item['color'] ?>">
								<h6><?php echo $item['title']; ?></h6>
							</div>
						</div>
						<div class="col-sm-9">
							<?php echo apply_filters('the_content',  $item["content"]); ?>
						</div>
						
						<?php
						// debug($item['button']); 
							get_component([
													'template' => 'atom/button-list',
													'vars' =>$item['button']	
													]); ?>
					</article>
		<?php } ?>
	</div>
</section>


<?php	} ?>



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
