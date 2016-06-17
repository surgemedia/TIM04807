<?php

 // get_component([
	// 					'template' => 'organism/jumbotron-text',
	// 					'vars' => [
	// 						'background'=> get_field('background'),
	// 					  'remove_tags'=> get_field('remove_elements'),
	// 						'title' => get_field('title'),
	// 						'subtitle' => get_field('subtitle'),
	// 						'content' => get_field('content'),
	// 					]
	// 		]);

 get_component([
						'template' => 'molecule/jumbotron-slider',
						'vars' => [
							'id' => get_field('id'),
							'slides' => get_field('slides'),
							'image' => get_field('image'),
						]
			]);



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