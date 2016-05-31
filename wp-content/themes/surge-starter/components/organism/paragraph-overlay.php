<?php
		$image = (!is_default($vars['background']))?$vars['background']:get_field('default_image','option');

 ?>
<section class="paragraph-overlay <?php echo $vars['class']?>" style="background-image: url('<?php echo $image;?>');">
	<div class="col-md-6 pull-right">
		<div class="box">
			<h3 class="text-uppercase"><?php echo $vars['subtitle'] ?></h3>
			<img class="img-responsive" src="<?php echo $vars['logo'] ?>" alt=""></img>
			<h1 class="text-uppercase">Phone <?php echo $vars['title'] ?></h1>
			<p><?php echo $vars['description'] ?></p>
			<?php echo $vars["atom"]; ?>
		</div>
	</div>
</section>