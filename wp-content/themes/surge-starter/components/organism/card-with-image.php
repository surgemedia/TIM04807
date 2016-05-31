<section class="container-fluid padding-6 <?php echo $vars['class'] ?>">
<?php
			

			/*=============================================
			= Card (Class,Image,Title,Content)
			= @components
				+ molecule/card
			=============================================*/
			get_component([ 'template' => 'molecule/card',
							'remove_tags' =>  ['img'],
											'vars' => [
														"class" => 'col-md-6 card para',
														"title" => $vars["title"],
														"subtitle" => $vars["subtitle"],
														"content" => apply_filters('the_content',  $vars["content"]),
															"button" => get_component([
																'template' => 'atom/link',
																'return_string' => true,
																'vars' => [
																			"class" => 'btn text-uppercase pull-left',
																			"text" => $vars['button'][0]['text'],
																			"url" => $vars['button'][0]['link_location'],
																			]
																])
														]
											 ]);

			
?>
	<div id="video" class="col-md-6 " style="background-image:url(<?php echo $vars['image'] ?>)">
	<?php if($vars['enable_video']){ ?>
	<i class="icon-play"></i>
	<?php echo $vars['video']; ?>
	<?php } ?>
	</div>
</section>