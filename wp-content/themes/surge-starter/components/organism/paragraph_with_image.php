<section class="container-fluid <?php echo $vars['class'] ?>">
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
	
	<img src="<?php echo $vars['image'] ?>" alt="paragraph" class="col-md-6">
</section>