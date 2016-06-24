<section class="bg-cover padding-6 <?php echo $vars['class'] ?>">
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
														"class" => 'col-md-6 card '+$vars['class'],
														"title" => $vars["title"],
														"subtitle" => $vars["subtitle"],
														"content" => apply_filters('the_content',  $vars["content"]),
														"button" => $vars['button']
														]
											 ]);
?>
</section>