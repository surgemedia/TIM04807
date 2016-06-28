<?php while (have_posts()) : the_post(); ?>
<?php 

$vars = array(
	'persons_title' => get_field('persons_title'),
	'short_bio' => get_field('short_bio'),
	'video' => get_field('video'),
	'video_screenshot' => get_field('video_screenshot'),
	'full_bio' => get_field('full_bio'),
	'key_points' => get_field('key_points'),
	'call_to_action' => get_field('call_to_action'),
	'large_image' => get_field('large_image'),

	);

 get_component([
						'template' => 'organism/jumbotron-text',
						'vars' => [
							'background'=> $vars['large_image'],
						  'remove_tags'=> get_field('remove_elements'),
							'title' => get_field('title'),
							'subtitle' => get_field('subtitle'),
							'content' => get_field('content'),
						]
			]);


 ?>


<?php endwhile; ?>
