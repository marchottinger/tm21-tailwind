<?php
function init_cpt() {

	register_post_type(
		'cpt_lieux',
		array(
			'labels' => array(
				'name' => __('Structures', 'tm21'),
				'singular_name' => __('Structure', 'tm21'),
				'all_items' => __('Toutes les structures', 'tm21'),
				'add_new' => __('Ajouter', 'tm21'),
				'add_new_item' => __('Ajouter une structure', 'tm21'),
				'edit' => __( 'Modifier', 'tm21' ),
				'edit_item' => __('Modifier la structure', 'tm21'),
				'new_item' => __('Nouvelle structure', 'tm21'),
				'view_item' => __('Voir la structure', 'tm21'),
				'search_items' => __('Chercher une structure', 'tm21'),
				'not_found' =>  __('Nothing found in the Database.', 'tm21'),
				'not_found_in_trash' => __('Nothing found in Trash', 'tm21'),
				'parent_item_colon' => 'Parent'
			),
			'description' => __( 'Liste des structures pour les collectifs', 'tm21' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'show_in_rest' => true,
			'menu_position' => 8,
			'menu_icon' => 'dashicons-admin-multisite',
			'rewrite'	=> array( 'slug' => 'structures', 'with_front' => false ),
			// 'has_archive' => 'cours',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'excerpt', 'revisions', 'page-attributes')
		)
	);

	// register_taxonomy_for_object_type('category', 'projet');
	// register_taxonomy_for_object_type('post_tag', 'projet');

	register_taxonomy( 'structure-type', 
		array('cpt_lieux'),
		array('hierarchical' => true,
			'labels' => array(
				'name' => __( 'Type de structure', 'jointswp' ),
				'singular_name' => __( 'Type de structure', 'jointswp' ),
				'search_items' =>  __( 'Rechercher type', 'jointswp' ),
				'all_items' => __( 'Tout les types', 'jointswp' ),
				'parent_item' => __( 'Parent', 'jointswp' ),
				'parent_item_colon' => __( 'Parent:', 'jointswp' ),
				'edit_item' => __( 'Modifier type', 'jointswp' ),
				'update_item' => __( 'Mettre à jour type', 'jointswp' ),
				'add_new_item' => __( 'Ajouter type', 'jointswp' ),
				'new_item_name' => __( 'Nouveau nom de type', 'jointswp' )
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'type de structure' ),
		)
	);

	register_taxonomy( 'colleges-desservis', 
		array('cpt_lieux'),
		array('hierarchical' => true,
			'labels' => array(
				'name' => __( 'Collèges desservis', 'jointswp' ),
				'singular_name' => __( 'Collège', 'jointswp' ),
				'search_items' =>  __( 'Rechercher', 'jointswp' ),
				'all_items' => __( 'Tous les collèges', 'jointswp' ),
				'parent_item' => __( 'Parent', 'jointswp' ),
				'parent_item_colon' => __( 'Parent:', 'jointswp' ),
				'edit_item' => __( 'Modifier', 'jointswp' ),
				'update_item' => __( 'Mettre à jour', 'jointswp' ),
				'add_new_item' => __( 'Ajouter', 'jointswp' ),
				'new_item_name' => __( 'Nouveau nom', 'jointswp' )
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'college-desservis' ),
		)
	);

}
add_action('init', 'init_cpt');	