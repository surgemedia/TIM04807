<article class="<?php echo $vars['class'] ?> card">
	<img class="img-responsive" src="<?php echo $vars["image"]?>" alt=""></img>
	<hgroup>
		<h6><?php echo $vars["subtitle"]?></h6>
		<h1><?php echo $vars["title"]?></h1>
	</hgroup>
	<?php echo apply_filters('the_content',  $vars["content"]); ?>
	<?php 
		get_component([
								'template' => 'atom/button-list',
								'vars' =>$vars['button']	
								]); ?>
	</article>