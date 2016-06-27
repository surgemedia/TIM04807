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

<section id="program-details" class="padding-6" style="background-image:url(<?php  echo $vars['background_image']; ?>)">
	
	<div class=" container">
	<div class="col-md-8 overlay">
		<hgroup class="col-md-8">
			<h6><?php echo $vars['subtitle']; ?></h6>
			<h1><?php echo $vars['title']; ?></h1>
		</hgroup>
		<div class="col-md-4 pull-right text-right"><a class="viewall" href="/programs">View All Programs</a></div>

		<?php 

		for ($vars['i']=0; $vars['i'] < $vars['paragraphs_size']; $vars['i']++) { 
			 			get_component([ 'template' => 'molecule/card',
											'remove_tags'=> ['img','h6'],
											'vars' => [
														"class" => 'col-md-6 paragraph',
														"title" => $vars['paragraphs'][$vars['i']]['title'],
														"content" => apply_filters('the_content',  $vars['paragraphs'][$vars['i']]["content"]),
														"button" => [],
														]
											 ]);
		} ?>
	</div>

	<div class="form-col col-md-4 pull-right <?php echo $vars['bg_color']; ?>">
	<?php 
	get_component([ 'template' => 'molecule/card',
											'vars' => [
														"class" => 'title',
														"title" => 'BOOK THIS PROGRAM',
														"button" => []
														]
											 ]);
		get_component([ 'template' => 'molecule/form',
											'remove_tags' =>  ['h2','p'],
											'vars' => [
														"class" => 'form text-center',
														"form" => $vars["form"],
														]
											 ]);
		?>
		<small><?php echo $vars['form_footer']; ?></small>
	</div>
		<footer class="col-md-8 pull-left <?php echo $vars['bg_color']; ?>">
			<h3 class="col-md-4"><?php echo $vars['bottom_title']; ?></h3>
			<p class="col-md-8"><?php echo $vars['bottom_textarea']; ?></p>
		</footer>
	</div>
</section>
<section id="program-content" class="bg-grey">
<div class="container">
	<?php the_content(); ?>
	</div>
</section>
<?php endwhile; ?>
