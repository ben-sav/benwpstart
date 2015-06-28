<?php

class CustomPost {

	private $modLabels = array(
		"name" => "Modules",
		"singular_name" => "Module",
		"menu_name" => "Modules"
	);

	public function __construct()
	{
		add_action('init', array($this, 'registerPostType'));
	}

	public function registerPostType()
	{
		register_post_type("modules", array(
			'public' => true,
			'labels' => $this->modLabels,
			'capability_type' => 'post',
			'supports' => array('title', 'editor', 'thumbnail', 'revisions','page-attributes'),
			'menu_position' => 6,
			'menu_icon' => 'dashicons-welcome-widgets-menus',
		));
	}
}

$customPost = new CustomPost();

?>
