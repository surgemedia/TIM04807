<?php $options = $vars["padding"].' '.$vars["background_color"].' '.$vars["margin"].' '.$vars['section_width']?>
<section id="<?php echo $vars["id"]?>" class="section-locator <?php echo $options ?>" style="background-image: url('<?php echo $vars['background_image'] ?>');">
	<?php
				/*=============================================
				=    Map (Class,Description)
				= @components
					+ molecule/map
				=============================================*/
				
				get_component([ 'template' => 'molecule/map',
												'vars' => [
															"class" => 'map text-center row ',
															"places" => $vars['places']
															]
												 ]);
	?>
</section>