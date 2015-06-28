<?php

// Register a custom taxonomy

/*if ( ! function_exists( 'ben_thematique' ) ) {

	function ben_thematique() {

		$labels = array(
			'name'                       => _x( 'Thématiques', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Thématique', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Thématiques', 'text_domain' ),
			'all_items'                  => __( 'Tous', 'text_domain' ),
			'parent_item'                => __( 'Parent', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent :', 'text_domain' ),
			'new_item_name'              => __( 'Nouveau', 'text_domain' ),
			'add_new_item'               => __( 'Ajouter un nouveau', 'text_domain' ),
			'edit_item'                  => __( 'Editer', 'text_domain' ),
			'update_item'                => __( 'Update', 'text_domain' ),
			'separate_items_with_commas' => __( 'Séparer les termes avec des virgules', 'text_domain' ),
			'search_items'               => __( 'Rechercher', 'text_domain' ),
			'add_or_remove_items'        => __( 'Ajouter ou supprimer', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choisir parmi les plus utilisés', 'text_domain' ),
			'not_found'                  => __( 'Pas de correspondance', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		
		register_taxonomy( 'thematique', array( 'post','modules' ), $args );

	}
	add_action( 'init', 'ben_thematique', 0 );

}*/

?>