<section id="contact" class="section-col-12-contact bg-cover padding-6 <?php echo $vars['class']?>" style=" background-image: url('<?php echo $vars['background'];?>');">
	<div class="col-md-8 col-md-offset-2 text-center ">
		<div class="box">
		
		<?php

		get_component([ 'template' => 'molecule/card',
											'remove_tags' => $vars["remove_elements"],
											'vars' => [
														"class" => 'style-3',
														"title" => $vars["title"],
														"subtitle" => $vars["subtitle"],
														"content" => $vars["content"],
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