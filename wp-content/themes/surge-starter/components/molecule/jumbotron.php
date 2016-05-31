<article class="jumbotron <?php echo $vars['class'] ?>" style="background-image:url(<?php echo $vars["image"]?>)">
	<hgroup>
		<h1><?php echo $vars["title"]?></h1>
	</hgroup>
	<?php echo apply_filters('the_content',  $vars["content"]); ?>
	<a class="btn" href="<?php echo $vars['button'][0]['href']; ?>"><?php echo $vars['button'][0]['text']; ?></a>
</article>