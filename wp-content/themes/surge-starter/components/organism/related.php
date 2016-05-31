<?php 
debug($vars);
$vars['title'] = get_the_title($vars['related_item'][0]->ID);
$vars['subtitle'] = wp_get_post_terms($vars['related_item'][0]->ID,'industry')[0]->name;

 ?>
<section class="<?php echo $vars['class'] ?> category container-fluid border-bottom grey-light-bg display-block">
	<div class="wrapper">
		<?php
				/*=============================================
				=            	Card (Class,Title,Subtitle)
				= @components
					+ molecule/card
				=============================================*/
				get_component([ 'template' => 'molecule/card',
								'remove_tags' =>  ['img'],
								'vars' => [
											"class" => 'container-fluid card text-center padding-2 title',
											"title" => $vars['title'],
											"subtitle" => $vars['subtitle']
											]
								 ]);
		?>
		



		<?php 
		$vars['repeater'] = get_field('repeater',$vars['related_item'][0]->ID);
		//debug(get_field('repeater',$vars['related_item'][0]->ID));
		for ($vars['i'] =0; $vars['i']  < sizeof($vars['repeater']); $vars['i'] ++) { 
			$vars['columns'] = $vars['repeater'][$vars['i'] ]['columns'];
			$vars['number_of_columns'] = sizeof($vars['repeater'][$vars['i'] ]['columns']);

			for ($vars['j'] =0; $vars['j']  < sizeof($vars['columns']); $vars['j'] ++) { 
				$vars['remove_tags'] = [];
				$vars['col-class'] = 'col-md-12';
				$vars['paragraph'] = $vars['columns'][$vars['j']];
				if($vars['number_of_columns'] == 2){
					$vars['col-class'] = 'col-md-6';
				}
				if(strlen($vars['paragraph']['image']) == 0){
					array_push($vars['remove_tags'],'img');
				}

				get_component([ 'template' => 'molecule/card',
								'remove_tags' =>  $vars['remove_tags'],
								'vars' => [
											"class" => $vars['col-class'].' card case-study',
											"image" => $vars['paragraph']['image'],
											"title" => $vars['paragraph']['title'],
											"content" => $vars['paragraph']['content']
											]
								 ]);
			}

		}
		?>

	</div>

</section>