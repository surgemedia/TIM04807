<?php
function getYtCode($data){
	$videoid = $data;
	$videoid = explode('/embed/',htmlentities($videoid))[1];
	$videoid = explode('?',$videoid)[0];
	return $videoid;
}				   
 ?>