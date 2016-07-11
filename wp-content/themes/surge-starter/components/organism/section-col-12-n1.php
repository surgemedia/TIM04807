<?php $options = $vars["padding"].' '.$vars["background_color"].' '.$vars["margin"].' '.$vars['section_width']?>

<?php //debug($vars['element']) ?>
<section id="<?php echo $vars["id"]?>" class="section-col-12-n1 <?php echo $options ?>" style="background-image: url('<?php echo $vars['background_image'] ?>');">
 <div class="container">
 	<?php
 			unset($element_file);
 			unset($element_vars);
 			for ($i=0; $i < sizeof($vars['element']); $i++) {
 				$element_file = $vars['element'][$i]['acf_fc_layout']; //get file
 				$vars['element'][0]['class'] = 'col-md-12';
 				unset($vars['element'][$i]['acf_fc_layout']); // remove file from array leveling only vars
 				$element_vars = $vars['element'][$i];
 				get_component([
 			 		'template' => 'molecule/'.$element_file,
 			 		'remove_tags'=> $vars['element'][$i]['remove_elements'],
 			 		'vars' => $element_vars
 					]);

 					unset($element_file);
 					unset($element_vars);
 			}
 					unset($i);

 			 ?>
 </div>
</section>