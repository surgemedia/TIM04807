<section class="container-fluid bg-cover padding-6 paragraph-overlay <?php echo $vars['class']?>" style=" background-image: url('<?php echo $vars['image'];?>');">
	<div class="col-md-8 col-md-offset-2 text-center">
		<div class="box">
		<?php 
		get_component([ 'template' => 'molecule/card',
											'remove_tags' => $vars["remove_elements"],
											'vars' => [
														"class" => 'title',
														"title" => $vars["title"],
														"subtitle" => $vars["subtitle"],
														"content" => apply_filters('the_content',  $vars["content"]),
														"button" => ''
														]
											 ]);
		get_component([ 'template' => 'molecule/form',
											'remove_tags' =>  ['h2','p'],
											'vars' => [
														"class" => 'form text-center',
														"form" => $vars["form"],
														]
											 ]);
		 ?>
		</div>
	</div>
</section>