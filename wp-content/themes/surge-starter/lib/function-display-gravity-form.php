<?php 
/*=========================================
=  To display Gravity Form in ACF        =
=========================================*/
function displayGravityForm($form_object) {
//displays the form selected in Page and created in Forms 
    gravity_form_enqueue_scripts($form_object, true);
	gravity_form($form_object['id'], true, true, false, '', true, 1);
}