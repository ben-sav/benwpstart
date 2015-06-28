<?php 

/**
 *	Register Theme Features
 */
function custom_theme_features()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 825, 510, true );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	//add_theme_support( 'title-tag' );

	// i18n support
	load_theme_textdomain('bentheme', get_template_directory() . '/languages');
}
add_action( 'after_setup_theme', 'custom_theme_features' );


/**
 *	Hide admin bar for sticky menu
 */
//show_admin_bar(false);


/**
 *	Includes
 */
define("CORE_DIR", get_stylesheet_directory(). "/core/");

require_once ( CORE_DIR . 'init/init.php' );
require_once ( CORE_DIR . 'custom-posts/custom-posts.php' );

require_once ( CORE_DIR . 'options/options.php' );

require_once ( CORE_DIR . 'shortcodes/shortcodes.php' );

?>
