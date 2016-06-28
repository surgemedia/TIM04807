<?php

if (is_front_page()){
 get_component([
						'template' => 'molecule/jumbotron-slider',
						'vars' => [
							'id' => get_field('id'),
							'slides' => get_field('slides'),
							'image' => get_field('image'),
						]
			]);
}else{

 get_component([
						'template' => 'organism/jumbotron-text',
						'vars' => [
							'background'=> get_field('background'),
						  'remove_tags'=> get_field('remove_elements'),
							'title' => get_field('title'),
							'subtitle' => get_field('subtitle'),
							'content' => get_field('content'),
						]
			]);



}


 



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
if (!is_front_page()){

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