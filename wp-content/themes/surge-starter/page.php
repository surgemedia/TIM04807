<?php

if (is_front_page()){ ?>

	<section id="<?php echo get_field('id') ?>" class="jumbotron-slider owl-carousel "  >
	
		<?php foreach (get_field('slides') as $vars) { ?>

		<div class="slide bg-cover" style="background-image:url(<?php echo $vars['background']?>)">

		<?php
				//debug($vars);
				/*=============================================
				= Card (Class,Image,Title,Content)
				= @components
					+ molecule/card
				=============================================*/
				get_component([ 'template' => 'molecule/card',
												'remove_tags'=>$vars['remove_elements'],
												'vars' => [
															"class" => 'pull-left '.$vars['style'],
															"image" => $vars['image'],
															"title" => $vars["title"],
															"subtitle" => $vars["subtitle"],
															"content" => $vars["content"],
															"button" => $vars['button']
															]
												 ]);
		?>
		</div>
		<?php  } ?>
	</section>		
<?php }else{ ?>
<section class="jumbotron-text bg-cover padding-6"  style="background-image:url(<?php echo get_field('background')?>)">
	<div class="container">
	<?php
			//debug($vars);
			/*=============================================
			= Card (Class,Image,Title,Content)
			= @components
				+ molecule/card
			=============================================*/
			get_component([ 'template' => 'molecule/text-subtitle-content',
											'remove_tags'=>get_field('remove_elements'),
											'vars' => [
														"class" => '',
														"title" => get_field('title'),
														"subtitle" => get_field('subtitle'),
														"content" => get_field('content'),
														]
											 ]);
	?>
	</div>
</section>

<?php }


 



$layout_builder = get_field('layout');

foreach ($layout_builder as $key => $value) {
	$section_file = $value['acf_fc_layout'];
	unset($value['acf_fc_layout']); //of section

			get_component([
						'template' => 'organism/'.$section_file,
						'vars' => $value
			]);
	unset($section_file);
}

?>

<?php 
if (!is_front_page() && !is_page("Contact") && !is_page("disclaimer") && !is_page("Privacy Policy")){

$vars['front_page'] =  get_option('page_on_front');
			$vars['builder'] = get_field('layout',$vars['front_page']);
			for ($vars['i']=0; $vars['i'] < sizeof($vars['builder']); $vars['i']++) { 
				if($vars['builder'][$vars['i']]['acf_fc_layout'] == 'section-2row-website-grid' && isset($vars['program_section']) != true){					
					$vars['program_section'] = $vars['builder'][$vars['i']];
				}
			}

	if(isset($vars['program_section']) == true){
	get_component([ 'template' => 'organism/section-2row-website-grid',
											'vars' => [
														"title" => $vars['program_section']['title'],
														"background_image" => $vars['program_section']['background_image'],
														"background_color" => $vars['program_section']['background_color'],
														"first_row" => $vars['program_section']['first_row'],
														"second_row" => $vars['program_section']['second_row'],
														"section_width" => 'container-fluid',
														"id" => "section-2row-website-grid",
														"padding" => 'padding-6',
														]
											 ]);
	}
}	
 ?>