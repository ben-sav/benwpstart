<?php 

class BenTinyButtons {

	public function __construct()
	{
		add_action( 'init', array($this, 'init' ));
	}

	public function init()
	{
    	add_filter( 'mce_external_plugins', array($this, 'add') );
    	add_filter( 'mce_buttons', array($this, 'register') );
	}

	public function add($plugin_array)
	{
    	$plugin_array['opyButtons'] = get_template_directory_uri() . '/opy/tinymce-buttons/tinymce-buttons.js';
    	return $plugin_array;
	}

	public function register($buttons)
	{
    	array_push( $buttons, '2colonnes' );
    	return $buttons;
	}

}

//$opyTinyButtons = new BenTinyButtons();

?>