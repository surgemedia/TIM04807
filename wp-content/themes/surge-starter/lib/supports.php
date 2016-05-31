<?php 

add_action( 'init', 'removeSupports_post' );
function removeSupports_post() {
	remove_post_type_support( 'post', 'excerpt' );
}

function removeSupports_page() {
	remove_post_type_support( 'page', 'editor' );
}

add_action( 'init', 'removeSupports_page' );
 ?>