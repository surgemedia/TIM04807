<?php
	//debug($vars['image_position']);


 if($vars['image_position'] == 'Right Side'){ 
	$vars['class'] .= ' pull-left';
	$vars['img_class'] = 'pull-right';
	} else {
		$vars['class'] .= ' pull-right';
		$vars['img_class'] = 'pull-left';
	}
	
?>
<?php
			//debug($vars);
			/*=============================================
			= Card (Class,Image,Title,Content)
			= @components
				+ molecule/card
			=============================================*/
			get_component([ 'template' => 'molecule/card',
											'remove_tags'=>$vars['remove_elements'],
											'vars' => [
														"class" => $vars['class'],
														"title" => $vars["title"],
														"image" => $vars["image"],
														"subtitle" => $vars["subtitle"],
														"content" => $vars["content"],
														"button" => $vars['button']
														]
											 ]);
?>
<div class="col-md-6 <?php echo $vars['img_class'] ?> text-center">
		<img class="img-responsive rounded" src="<?php echo $vars['side_image'] ?>" alt="">
</div>