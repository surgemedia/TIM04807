<?php 
/*=========================================
=            Resize iamge         =
=========================================*/
function img_resize($image_url,$width,$height,$quailty,$crop  = false,$flip = NULL) {
	$string = "http://ocsinternational.surgehost.com.au".'/i.php';

	$string .= $i.'?i='.$image_url;
	if($width){
	$width = '&w='.$width;
	}
	if($height){
	$height = '&h='.$height;
	}
	if($crop){
	$crop = '&c='.$crop;
	}
	if($quailty){
		$quailty = '&q='.$quailty;
	}
	if($flip){
	$flip = '&f='.$flip;
	}
	


	
	if($image_url){
		return $string.$width.$height.$quailty.$crop.$flip;  
	} else {
		return 'https://placeholdit.imgix.net/~text?txtsize=33&txt=No+URL+GIVEN&w=350&h=150';
	}
}
