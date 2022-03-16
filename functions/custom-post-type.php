<?php

function init_cpt() {

	register_post_type(
		'custom_post',
		array(
			'labels' => array(
				'name' => __('Custom posts', 'tm21'),
				'singular_name' => __('Custom post', 'tm21'),
				'all_items' => __('Tout les custom posts', 'tm21'),
				'add_new' => __('Ajouter', 'tm21'),
				'add_new_item' => __('Ajouter', 'tm21'),
				'edit' => __('Editer', 'tm21'),
				'edit_item' => __('Editer', 'tm21'),
				'new_item' => __('Nouveau', 'tm21'),
				'view_item' => __('Voir', 'tm21'),
				'search_items' => __('Rechercher', 'tm21'),
				'not_found' =>  __('Nothing found in the Database.', 'tm21'),
				'not_found_in_trash' => __('Nothing found in Trash', 'tm21'),
				'parent_item_colon' => ''
			),
			'description' => __('This is the example custom post type', 'tm21'),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'show_in_rest' => true,
			'menu_position' => 8,
			'menu_icon' => 'dashicons-format-audio',
			'rewrite'	=> array('slug' => 'cours', 'with_front' => false),
			'has_archive' => 'cours',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'revisions', 'sticky')
		)
	);

	// register_taxonomy_for_object_type('category', 'projet');
	// register_taxonomy_for_object_type('post_tag', 'projet');
}
add_action('init', 'init_cpt');


register_taxonomy(
	'custom_tax',
	array('custom_post'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Custom taxs', 'tm21'),
			'singular_name' => __('Custom tax', 'tm21'),
			'search_items' =>  __('Search custom tax', 'tm21'),
			'all_items' => __('All custom tax', 'tm21'),
			'parent_item' => __('Parent custom tax', 'tm21'),
			'parent_item_colon' => __('Parent custom tax:', 'tm21'),
			'edit_item' => __('Edit custom tax', 'tm21'),
			'update_item' => __('Update custom tax', 'tm21'),
			'add_new_item' => __('Add New custom tax', 'tm21'),
			'new_item_name' => __('New custom tax', 'tm21')
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
		'rewrite' => array('slug' => 'style'),
	)
);