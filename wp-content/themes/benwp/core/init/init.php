<?php

require_once ( CORE_DIR . 'init/menu.php' );
require_once ( CORE_DIR . 'init/register.php' );
//require_once ( CORE_DIR . 'init/tiny.php' );

/**
 * add thumb column to wp admin
 * see: http://wpsnipp.com/index.php/functions-php/add-featured-thumbnail-to-admin-post-columns/
 */
function ben_posts_columns($columns){
    $new = array();
    foreach($columns as $key => $title) {
    if ($key=='title') // Put the Thumbnail column before the Author column
        $new['opy_post_thumbs'] = 'Thumbnail';
        $new[$key] = $title;
    }
    return $new;
}
function ben_posts_custom_columns($column_name, $id){
    if($column_name === 'opy_post_thumbs'){
        echo the_post_thumbnail( 'thumbnail' );
    }
}
add_filter('manage_posts_columns', 'ben_posts_columns', 5);
add_action('manage_posts_custom_column', 'ben_posts_custom_columns', 5, 2);
add_filter('manage_pages_columns', 'ben_posts_columns', 5);
add_action('manage_pages_custom_column', 'ben_posts_custom_columns', 5, 2);


function your_own_embed_size() { 
    return array( 'width' => 1000, 'height' => 500 );
}
//add_filter( 'embed_defaults', 'your_own_embed_size' );

?>