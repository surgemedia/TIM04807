<?php while (have_posts()) : the_post(); ?>
<?php 


	//debug(get_post_meta(get_the_id()));


$vars = [
	'title' => get_field('title'),
	'subtitle' => get_field('subtitle'),
	'paragraphs' => get_field('paragraphs'),
	'paragraphs_size' => sizeof(get_field('paragraphs')),
	'form' => get_field('form'),
	'form_footer' => get_field('form_footer'),
	'bottom_title' => get_field('bottom_title'),
	'bottom_textarea' => get_field('bottom_textarea'),
	'background_image' => get_field('image'),
	'color' => get_field('color'),
	];
	debug($vars);
 ?>

<section class="" style="background-image:url(<?php  echo $vars['background_image']; ?>)">
	
	<div class="overlay container">
		<hgroup>
			<h6><?php echo $vars['subtitle']; ?></h6>
			<h1><?php echo $vars['title']; ?></h1>
		</hgroup>
		<?php 

		for ($vars['i']=0; $vars['i'] < $vars['paragraphs_size']; $vars['i']++) { 

			 			get_component([ 'template' => 'molecule/card',
											'remove_tags'=> ['img','h6',],
											'vars' => [
														"class" => 'col-md-6 card',
														"title" => $vars["title"]$vars['i'],
														"subtitle" => $vars["subtitle"],
														"content" => apply_filters('the_content',  $vars["content"]),
														"button" => $vars['button'],
														]
											 ]);
		} ?>
	</div>

</section>

<?php endwhile; ?>
