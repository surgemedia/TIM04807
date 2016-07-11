 
<?php if($vars['tabs_type'] == 'accordion') { ?>
  <?php echo "Not Coded Yet..." ?>
<!-- <div class="panel-group" role="tablist" aria-multiselectable="true">
	<?php
	$vars['loop_size'] = sizeof($vars['tabs_tab']);
	for ($i=0; $i < $vars['loop_size']; $i++) { 	
	 	get_component([
			 'template' => 'atom/accordion-single',
			 'vars' => [
			 						'title' => $vars['tabs_tab'][$i]['title'],
			 						'content' => $vars['tabs_tab'][$i]['content'],
			 						'collapse_id' => rand(),
			 						'trigger_id' => rand(),
			 						],
			]);
	 }
	 unset($i);
			 ?>
  </div> -->
<?php } elseif($vars['tabs_type'] == 'tab'){  ?>
<div class="text-center tab-contact">
 <p><?php echo $vars['tabs_info']?></p>
 <ul class="nav nav-tabs" role="tablist">
 <?php $vars['loop_size'] = sizeof($vars['tabs_tab']); ?>
 <?php for ($i=0; $i < $vars['loop_size']; $i++) { 
 		$vars['tabs_tab'][$i]['slug'] = rand(); ?>
    <li role="presentation" class="<?php if($i == 0){echo 'active'; } ?>"><a href="#<?php echo $vars['tabs_tab'][$i]['slug']; ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo $vars['tabs_tab'][$i]['tab_title'] ?></a></li>
	<?php } unset($i); ?>
  </ul>
	
  <!-- Tab panes -->
  <div class="tab-content">
    <?php for ($i=0; $i < $vars['loop_size']; $i++) {  ?>
	    <div role="tabpanel" class="tab-pane <?php if($i == 0){echo 'active'; } ?>" id="<?php echo $vars['tabs_tab'][$i]['slug']; ?>">
			<?php
			//debug($vars);
			/*=============================================
			= Card (Class,Image,Title,Content)
			= @components
				+ molecule/card
			=============================================*/
			get_component([ 'template' => 'molecule/card',
											'remove_tags'=>['h6'],
											'vars' => [
														"class" => 'col-md-6',
														"image" => $vars['tabs_tab'][$i]['left_image'],
														"title" => $vars['tabs_tab'][$i]["left_title"],
														"content" => $vars['tabs_tab'][$i]["left_content"],
														]
											 ]);
			?>
			<?php
			//debug($vars);
			/*=============================================
			= Card (Class,Image,Title,Content)
			= @components
				+ molecule/card
			=============================================*/
			get_component([ 'template' => 'molecule/card',
											'remove_tags'=>['h6'],
											'vars' => [
														"class" => 'col-md-6',
														"image" => $vars['tabs_tab'][$i]['right_image'],
														"title" => $vars['tabs_tab'][$i]["right_title"],
														"content" => $vars['tabs_tab'][$i]["right_content"],
														]
											 ]);
			?>
	    </div>
		<?php } ?>
  </div>
</div>
<?php } ?>