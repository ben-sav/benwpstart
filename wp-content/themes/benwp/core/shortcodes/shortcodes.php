<?php

function ben_shortcode_test( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'text' => 'Test d\'un shortcode !'
    ), $atts ) );
    return $text;
}
add_shortcode( 'test', 'ben_shortcode_test' );

?>