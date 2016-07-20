
<?php $options = $vars["padding"].' '.$vars["background_color"].' '.$vars["margin"].' '.$vars['section_width']?>

<section id="<?php echo $vars["id"]?>" class="section-col-6-n2 <?php echo $options ?>" style="background-image: url('<?php echo $vars['background_image'] ?>');">
<?php
	/*=====================================
	=            Get Files            =
	=====================================*/
	

	$element_file_l = $vars['1_element'][0]['acf_fc_layout']; //get file
	$element_file_r = $vars['2_element'][0]['acf_fc_layout']; //get file
// debug($element_file_l);
	unset($vars['1_element'][0]['acf_fc_layout']); // remove file from array leveling only vars
	unset($vars['2_element'][0]['acf_fc_layout']); // remove file from array leveling only vars

	/*=====================================
	=            Setup Classes            =
	=====================================*/
	
	$vars['1_element'][0]['class'] = 'col-md-6 '.$vars['1_element'][0]['style']; //because i know this from the file name
	$vars['2_element'][0]['class'] = 'col-md-6 '.$vars['2_element'][0]['style']; //because i know this from the file name

	/*==================================
	=            Setup Vars            =
	==================================*/
	$element_vars_l = $vars['1_element'][0];
	$element_vars_r = $vars['2_element'][0];
	//Element L
	get_component([
	 'template' => 'molecule/'.$element_file_l,
	 'remove_tags'=>$vars['1_element'][$i]['remove_elements'],
	 'vars' => $element_vars_l
			]);
	//Element R
	get_component([
	 'template' => 'molecule/'.$element_file_r,
	 'remove_tags'=>$vars['2_element'][$i]['remove_elements'],
	 'vars' => $element_vars_r
			]);
	unset($element_file_l);
	unset($element_file_r);
	unset($element_vars_l);
	unset($element_vars_r);

 ?>
</section>