
<?php //debug(get_field('layout')); 

$layout_builder = get_field('layout'); 


for ($section_count =0; $section_count  < sizeof($layout_builder); $section_count ++) {
	//Start Class
	$section = new LayoutBuilder;
 	$section->setup($layout_builder[$section_count]['section']);
 ?>
 <?php 
/*===============================
=            Section            =
===============================*/
?>
<section id="section<?php echo $section_count; ?>" class="row">
	<?php
	/*===========================
	=            ROW            =
	===========================*/
	
	?>
	<!-- GRID SECTION -->
	<?php for ($row_count =0; $row_count  < sizeof($section->grids); $row_count ++) {  ?>
		<div id="row<?php echo $section_count; ?>"  class="<?php echo $section->meta['class']; ?>">

			<?php 
			if(sizeof($section->elements($row_count)['element']) > 0){

				foreach ($section->elements($row_count) as $key => $value) {
				/*=========================================
				=            Bootstrap Columns            =
				=========================================*/
					for ($col_i=0; $col_i < sizeof($section->elements($row_count)[$key]); $col_i++) { 
					$section->bs_class($value[$col_i]);
					?>
					<div class="<?php echo $section->bs_class ?>">
					<?php	
					/*===============================
					=            Element            =
					===============================*/
					get_component([ 'template' => 'molecule/'.$section->template,
										'remove_tags' =>  [''],
														'vars' => $value[$col_i]
														 ]);
														 ?>
					</div>
				<?php	}
			 ?>
			 </div>
			<?php } } else { ?>
			<?php $section->bs_class($section->rows[$row_count]); ?>
							<div class="<?php echo $section->bs_class ?>">
							<?php	
							
							//===============================
							//=            Element            =
							//===============================
							get_component([ 'template' => 'organism/'.$section->template,
												'remove_tags' =>  [''],
																'vars' => $section->rows[$row_count]
																 ]);
																 ?>
							</div>
	
			<?php } ?>
		</div>
	<?php } ?>



</section>
<?php } ?>
