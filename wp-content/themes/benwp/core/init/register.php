<?php

// Add styles and scripts

function ben_register_styles() {

    wp_enqueue_style( 'style', get_stylesheet_uri() );

    wp_deregister_script('jquery');
    wp_enqueue_script( 'scripts', get_template_directory_uri().'/js/main.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'ben_register_styles' );

?>