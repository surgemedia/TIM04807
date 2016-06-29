<?php while (have_posts()) : the_post(); ?>
<?php 

$vars = array(
	'persons_title' => get_field('persons_title'),
	'short_bio' => get_field('short_bio'),
	'video' => get_field('video'),
	'video_screenshot' => get_field('video_screenshot'),
	'full_bio' => get_field('full_bio'),
	'key_points' => get_field('key_points'),
	'card_image' => get_field('call_to_action_image'),
	'card_title' => get_field('call_to_action_title'),
	'card_subtitle' => get_field('call_to_action_subtitle'),
	'card_content' => get_field('call_to_action_content'),
	'card_button' => get_field('call_to_action_button'),
	'large_image' => get_field('large_image'),

	);
	//debug($vars);
 // get_component([
	// 					'template' => 'organism/jumbotron-text',
	// 					'vars' => [
	// 						'background'=> $vars['large_image'],
	// 					  'remove_tags'=> get_field('remove_elements'),
	// 						'title' => get_field('title'),
	// 						'subtitle' => get_field('subtitle'),
	// 						'content' => get_field('content'),
	// 					]
	// 		]);
 ?>
<section class="container-fluid padding-6">
	<div class="col-md-6 text-center">
	<div class="short-bio item">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum quasi laborum esse unde impedit nemo dignissimos ut nulla quisquam officia dicta recusandae repudiandae fuga, at beatae, dolore sapiente voluptates totam?</p>
		</div>
	</div>
	<div class="col-md-6">
		<div class="video item">
		<img class="img-responsive" src="<?php echo $vars['video_screenshot']; ?>" alt="#">
		</div>
	</div>
</section>
<section class="bg-blue container-fluid padding-6">
	<div class="col-md-4">
	<div class="item text-center">
		<i class="icon-keynote"></i>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora recusandae, nobis dicta repellendus ipsa quos praesentium cum earum possimus iusto id assumenda dolorem voluptates sint ex odit ut. Omnis, ipsam.</p>
	</div></div>
	<div class="col-md-4">
	<div class="item text-center">
		<i class="icon-keynote"></i>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos esse tempore officia eius dolorem optio sapiente quia laudantium magnam veritatis est non vero consequuntur asperiores modi mollitia tempora dignissimos, impedit?</p>
	</div></div>
	<div class="col-md-4">
	<div class="item text-center">
		<i class="icon-keynote"></i>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque quam, incidunt ab, dolorem omnis placeat aspernatur tempore expedita eveniet eius voluptatum labore sequi sapiente ex quia nobis repudiandae, ipsa nihil!</p>
	</div></div>
</section>
<section class="container-fluid padding-6" style="background-image:url('<?php echo $vars['card_image']; ?>')">
	<?php debug($vars['card_image']); ?>
	<?php debug($vars['card_title']); ?>
	<?php debug($vars['card_subtitle']); ?>
	<?php debug($vars['card_content']); ?>
	<?php debug($vars['card_button']); ?>
</section>



<?php endwhile; ?>
