<?php //debug($vars) ?>
<section class="jumbotron-slider owl-carousel "  >
	
	<?php foreach ($vars['slides'] as $vars) { ?>

	<div class="bg-cover" style="background-image:url(<?php echo $vars["background"]?>)">

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
														"class" => 'pull-left '.$vars['style'],
														"image" => $vars['image'],
														"title" => $vars["title"],
														"subtitle" => $vars["subtitle"],
														"content" => $vars["content"],
														"button" => $vars['button']
														]
											 ]);
	?>
	</div>
	<?php  } ?>
</section>
  