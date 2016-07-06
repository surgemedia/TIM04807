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
	'card_remove_tags' => get_field('call_to_action_remove_elements'),
	'large_image' => get_field('large_image'),
	'back_image' => get_field('back_section_image'),
	'back_title' => get_field('back_section_title'),
	'back_subtitle' => get_field('back_section_subtitle'),
	'back_content' => get_field('back_section_content'),
	'back_button' => get_field('back_section_button'),
	'back_remove_tags' => get_field('back_section_remove_elements'),
	'form_class' => get_field('form_class'),
	'form_image' => get_field('form_image'),
	'form_title' => get_field('form_title'),
	'form_subtitle' => get_field('form_subtitle'),
	'form_content' => get_field('form_content'),
	'form_form' => get_field('form_form'),
	'bio_file' => get_field('bio_file'),
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
											'remove_tags'=>['p'],
											'vars' => [
														"class" => '',
														"title" => get_the_title(),
														"subtitle" => get_field('persons_title'),
														
														]
											 ]);
	?>
	</div>
</section>

<section class="container-fluid padding-6 video" >
	<div class="col-md-6 text-center short-bio">
			<?php
				//debug($vars);
				/*=============================================
				= Card (Class,Image,Title,Content)
				= @components
					+ molecule/card
				=============================================*/
				get_component([ 'template' => 'molecule/card',
												'remove_tags'=>['h1','h6','img'],
												'vars' => [
															"class" => 'col-md-10 col-lg-8',
															"content" => $vars['short_bio'],
															"button" => array([
																				'text'=> "download full bio",
																				'link'=> $vars['bio_file'],
																				'extra-data'=>"target='_blank'"
																				])
															]
												 ]);
			?>
	</div>
	<div class="col-md-6 text-center">
	<script type="text/javascript">
		function getFrameContent(button){
		  jQuery('#replaceable').empty();
		  var html;
		  var frame;
		  frame = jQuery(button).data('contentid');
		  html = jQuery('[data-frameid="'+frame+'"]').clone();
		  jQuery('#replaceable').html(html);
		}
		</script>
		<div class="col-md-10 col-lg-8 video-item ">
			<a href="" onclick="getFrameContent(this);" data-toggle="modal" data-target="#caseStudyModal" data-contentid="targetVideo" class="bg-cover">
				<img class="img-responsive" src="<?php echo $vars['video_screenshot']; ?>" alt="#">
				<i class="icon-play"></i>
			</a>
			<div class="hiddenFrame" data-frameid="targetVideo" >
        <iframe src="https://www.youtube.com/embed/<?php echo getYtCode($vars['video']) ?>" frameborder="0" allowfullscreen=""></iframe>
      </div>
			<!-- Modal -->
			<div class="modal fade" id="caseStudyModal" tabindex="-1" role="dialog" aria-labelledby="caseStudyModal">
			  <div class="modal-dialog" role="document">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        <i class="icon-close-button"></i>
			        </button>
			    <div class="modal-content">
			      <div id="replaceable" class=""></div>
			    </div>
			  </div>
			</div>
			<script>
			  jQuery('#caseStudyModal').on('hidden.bs.modal', function (e) {
			   jQuery('#replaceable').empty();
			  });
			</script>
		</div>
	</div>
</section>
<?php //debug($vars["key_points"]) ?>
<section class="bg-blue padding-6 key_points">
	<div class="container">
		<?php foreach ($vars["key_points"] as $key_point) :?>
		<div class="col-md-4">
			<div class="item text-center text-white">
				<i class="icon-<?php echo $key_point['icon'];?>"></i>
				<div class="content display-inline-block col-md-10"><?php echo apply_filters('the_content',  $key_point["content"]); ?></div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</section>
<section class="business-keynote container-fluid padding-6" style="background-image:url('<?php echo $vars['card_image']; ?>')">
		<div class="container">
			<?php
				//debug($vars);
				/*=============================================
				= Card (Class,Image,Title,Content)
				= @components
					+ molecule/card
				=============================================*/
				get_component([ 'template' => 'molecule/card',
												'remove_tags'=>$vars['card_remove_tags'],
												'vars' => [
															"class" => 'col-xs-12 padding-6',
															"subtitle" => $vars['card_subtitle'],
															"title" => $vars['card_title'],
															"content" => $vars['card_content'],
															"button" => $vars['card_button']
															]
												 ]);
			?>
		
	</div>
</section>

<section class="back container-fluid padding-6" style="background-image:url('<?php echo $vars['back_image']; ?>')">
		<div class="container">
			<?php
				//debug($vars);
				/*=============================================
				= Card (Class,Image,Title,Content)
				= @components
					+ molecule/card
				=============================================*/
				get_component([ 'template' => 'molecule/card',
												'remove_tags'=>$vars['back_remove_tags'],
												'vars' => [
															"class" => 'col-xs-12 padding-6',
															"subtitle" => $vars['back_subtitle'],
															"title" => $vars['back_title'],
															"content" => $vars['back_content'],
															"button" => $vars['back_button']
															]
												 ]);
			?>
		
	</div>
</section>

<section class="bg-cover padding-6 paragraph-overlay <?php echo $vars['form_class']?>" style=" background-image: url('<?php echo $vars['form_image'];?>');">
	<div class="col-md-8 col-md-offset-2 text-center ">
		<div class="box">
		
		<?php

		get_component([ 'template' => 'molecule/card',
											'remove_tags' => $vars["form_remove_elements"],
											'vars' => [
														"class" => 'style-3',
														"title" => $vars["form_title"],
														"subtitle" => $vars["form_subtitle"],
														"content" => $vars["form_content"],
														]
											 ]);
		get_component([ 'template' => 'molecule/form',
											'remove_tags' =>  ['h2','p'],
											'vars' => [
														"class" => 'form text-center',
														"form" => $vars["form_form"],
														]
											 ]);
		 ?>
		</div>
	</div>
</section>


<?php endwhile; ?>
