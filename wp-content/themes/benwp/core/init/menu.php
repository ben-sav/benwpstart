<?php

// Register menus

function ben_register_menu() {
	register_nav_menus(array(
		'principal' => 'Menu principal',
	));
}
add_action( 'init', 'ben_register_menu' );

?>