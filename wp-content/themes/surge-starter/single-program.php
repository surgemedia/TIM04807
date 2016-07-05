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
	);

 ?>

<section id="program-details" class="padding-6 container-fluid" style="background-image:url(<?php  echo $vars['background_image']; ?>)">
	
	<div class=" col-md-10 col-md-offset-1">
	<div class="col-md-9 overlay">
		<hgroup class="col-md-12">
			<a class="viewall" href="/programs">View All Programs</a>
			<h6><?php echo $vars['subtitle']; ?></h6>
			<h1><?php echo $vars['title']; ?></h1>
		</hgroup>

		<?php 

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
		} ?>
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
		<footer class="col-md-9 pull-left <?php echo $vars['bg_color']; ?>">
			<h3 class="col-md-4"><?php echo $vars['bottom_title']; ?></h3>
			<div class="col-md-8"><?php echo $vars['bottom_textarea']; ?></div>
		</footer>
	</div>
</section>
<section id="program-content" class="bg-grey padding-5 row">
<div class="col-md-8 col-md-offset-2">
	<?php the_content(); ?>
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
