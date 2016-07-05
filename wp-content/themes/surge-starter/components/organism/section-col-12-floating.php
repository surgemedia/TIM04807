<section class="paragraph-overlay padding-6 bg-cover <?php echo $vars['class']?>" style="background-image: url('<?php echo $vars['image'];?>');">
<div class="container">
	<div class="col-md-6 pull-right">
		<div class="box">
		<?php 
		unset($element_file);
		unset($element_vars);
		for ($i=0; $i < sizeof($vars['element']); $i++) { 
			$element_file = $vars['element'][$i]['acf_fc_layout']; //get file
			unset($vars['element'][$i]['acf_fc_layout']); // remove file from array leveling only vars
			$element_vars = $vars['element'][$i];
			get_component([
		 		'template' => 'molecule/'.$element_file,
		 		'remove_tags'=>$vars['element'][$i]['remove_elements'],
		 		'vars' => $element_vars
				]);

				unset($element_file);
				unset($element_vars);
		}
				unset($i);
		
		 ?>
		</div>
		</div>
	</div>
</section>