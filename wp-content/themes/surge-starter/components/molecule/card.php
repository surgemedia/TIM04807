<article class="<?php echo $vars['class'] ?>">
	<img class="img-responsive" src="<?php echo $vars["image"]?>" alt=""></img>
	<hgroup>
		<h6><?php echo $vars["subtitle"]?></h6>
		<h1><?php echo $vars["title"]?></h1>
	</hgroup>
	<?php echo apply_filters('the_content',  $vars["content"]); ?>
<?php if(strlen($vars['button'][0]['text']) != 0){ ?>
		<?php if(is_array($vars['button']) == 1){ ?>
			<?php 
				get_component([
								'template' => 'atom/link',
								'vars' => [
									"class" => 'btn text-uppercase pull-left',
									"text" => $vars['button'][0]['text'],
									"url" => $vars['button'][0]['link'],
									]
				]);
																 ?>
		<?php } else { ?>
		<?php echo $vars['button']; ?>
		<?php } ?>
​
	<?php } ?>
</article>