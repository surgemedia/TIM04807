<?php 
/*=========================================
=  To display Gravity Form in ACF        =
=========================================*/
function displayGravityForm($form_object) {
//displays the form selected in Page and created in Forms 
    gravity_form_enqueue_scripts($form_object, true);
   //debug($form_object." asd");
	if(is_array($form_object)){
		$form_object=$form_object['id'];
	}
	gravity_form($form_object, false, false, false, null, true, 1,true);
}