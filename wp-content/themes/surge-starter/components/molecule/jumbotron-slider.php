<?php //debug($vars) ?>
<section class="jumbotron owl-carousel bg-cover padding-6"  >
	
	<?php foreach ($vars['slides'] as $item) { ?>

	<div class="" style="background-image:url(<?php echo $item["background"]?>)">
	<article class="pull-left col-md-7">
		<img src="<?php echo $item['image']?>" alt="">
		<hgroup>
			<h1><?php echo $item['title'] ?></h1>
		</hgroup>
		<?php echo apply_filters('the_content',  $item['content']); ?>
		
	</article>
	</div>
	<?php  } ?>
</section>