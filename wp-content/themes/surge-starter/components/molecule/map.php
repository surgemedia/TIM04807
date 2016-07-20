<article class="<?php echo $vars['class'] ?>">
<div id="map-buttons "class="">




	<div id="map-canvas" class="padding-2" style="height:525px"></div>

<?php 
	// google map script
	
	get_component(['template' => 'atom/map-script',
										'vars'	=> [
													"location" => $vars['places']
													]
							]);
 ?>


	</div>
</article>