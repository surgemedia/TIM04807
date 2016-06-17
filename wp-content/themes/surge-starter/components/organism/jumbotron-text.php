<?php // debug($vars) ?>
<section class="jumbotron-text bg-cover padding-6"  style="background-image:url(<?php echo $vars["background"]?>)">
	<div class="container">
	<?php
			//debug($vars);
			/*=============================================
			= Card (Class,Image,Title,Content)
			= @components
				+ molecule/card
			=============================================*/
			get_component([ 'template' => 'molecule/text-subtitle-content',
											'remove_tags'=>$vars['remove_tags'],
											'vars' => [
														"class" => '',
														"title" => $vars["title"],
														"subtitle" => $vars["subtitle"],
														"content" => apply_filters('the_content',  $vars["content"]),
														]
											 ]);
	?>
	</div>
</section>


