<?php

// let's create the function for the custom type


function custom_post_course()
{
	// creating (registering) the custom type
	register_post_type(
		'course', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array(
			'labels' => array(
				'name' => __('Cours', 'tm21'), /* This is the Title of the Group */
				'singular_name' => __('Cours', 'tm21'), /* This is the individual type */
				'all_items' => __('Tout les cours', 'tm21'), /* the all items menu item */
				'add_new' => __('Ajouter', 'tm21'), /* The add new menu item */
				'add_new_item' => __('Ajouter', 'tm21'), /* Add New Display Title */
				'edit' => __('Editer', 'tm21'), /* Edit Dialog */
				'edit_item' => __('Editer', 'tm21'), /* Edit Display Title */
				'new_item' => __('Nouveau', 'tm21'), /* New Display Title */
				'view_item' => __('Voir', 'tm21'), /* View Display Title */
				'search_items' => __('Rechercher projet', 'tm21'), /* Search Custom Type Title */
				'not_found' =>  __('Nothing found in the Database.', 'tm21'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('Nothing found in Trash', 'tm21'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __('This is the example custom post type', 'tm21'), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'show_in_rest' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-format-audio', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array('slug' => 'cours', 'with_front' => false), /* you can specify its url slug */
			'has_archive' => 'cours', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'projet');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'projet');
}

// adding the function to the Wordpress init
add_action('init', 'custom_post_course');

function custom_post_teacher()
{
	// creating (registering) the custom type
	register_post_type(
		'teacher', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array(
			'labels' => array(
				'name' => __('Professeurs', 'tm21'), /* This is the Title of the Group */
				'singular_name' => __('Professeur', 'tm21'), /* This is the individual type */
				'all_items' => __('Tout les professeurs', 'tm21'), /* the all items menu item */
				'add_new' => __('Ajouter', 'tm21'), /* The add new menu item */
				'add_new_item' => __('Ajouter', 'tm21'), /* Add New Display Title */
				'edit' => __('Editer', 'tm21'), /* Edit Dialog */
				'edit_item' => __('Editer', 'tm21'), /* Edit Display Title */
				'new_item' => __('Nouveau', 'tm21'), /* New Display Title */
				'view_item' => __('Voir', 'tm21'), /* View Display Title */
				'search_items' => __('Rechercher projet', 'tm21'), /* Search Custom Type Title */
				'not_found' =>  __('Nothing found in the Database.', 'tm21'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('Nothing found in Trash', 'tm21'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __('This is the example custom post type', 'tm21'), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'show_in_rest' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-universal-access', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array('slug' => 'professeur', 'with_front' => false), /* you can specify its url slug */
			'has_archive' => 'professeur', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'projet');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'projet');
}

// adding the function to the Wordpress init
add_action('init', 'custom_post_teacher');




/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

// now let's add custom categories (these act like categories)
register_taxonomy(
	'course-style',
	array('course','teacher'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array(
		'hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __('Styles', 'tm21'), /* name of the custom taxonomy */
			'singular_name' => __('Style', 'tm21'), /* single taxonomy name */
			'search_items' =>  __('Search style', 'tm21'), /* search title for taxomony */
			'all_items' => __('All style', 'tm21'), /* all title for taxonomies */
			'parent_item' => __('Parent style', 'tm21'), /* parent title for taxonomy */
			'parent_item_colon' => __('Parent style:', 'tm21'), /* parent taxonomy title */
			'edit_item' => __('Edit style', 'tm21'), /* edit custom taxonomy title */
			'update_item' => __('Update style', 'tm21'), /* update title for taxonomy */
			'add_new_item' => __('Add New style', 'tm21'), /* add new title for taxonomy */
			'new_item_name' => __('New style', 'tm21') /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
		'rewrite' => array('slug' => 'style'),
	)
);



register_taxonomy(
	'instrument',
	array('course','teacher'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array(
		'hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __('Instruments', 'tm21'), /* name of the custom taxonomy */
			'singular_name' => __('Instrument', 'tm21'), /* single taxonomy name */
			'search_items' =>  __('Search instruments', 'tm21'), /* search title for taxomony */
			'all_items' => __('All instruments', 'tm21'), /* all title for taxonomies */
			'parent_item' => __('Parent instrument', 'tm21'), /* parent title for taxonomy */
			'parent_item_colon' => __('Parent instrument:', 'tm21'), /* parent taxonomy title */
			'edit_item' => __('Edit instrument', 'tm21'), /* edit custom taxonomy title */
			'update_item' => __('Update instrument', 'tm21'), /* update title for taxonomy */
			'add_new_item' => __('Add New instrument', 'tm21'), /* add new title for taxonomy */
			'new_item_name' => __('New instrument', 'tm21') /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
		'rewrite' => array('slug' => 'instrument'),
	)
);
register_taxonomy(
	'age',
	array('course','teacher'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array(
		'hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __('Ages', 'tm21'), /* name of the custom taxonomy */
			'singular_name' => __('Age', 'tm21'), /* single taxonomy name */
			'search_items' =>  __('Search âges', 'tm21'), /* search title for taxomony */
			'all_items' => __('All âges', 'tm21'), /* all title for taxonomies */
			'parent_item' => __('Parent age', 'tm21'), /* parent title for taxonomy */
			'parent_item_colon' => __('Parent age:', 'tm21'), /* parent taxonomy title */
			'edit_item' => __('Edit age', 'tm21'), /* edit custom taxonomy title */
			'update_item' => __('Update age', 'tm21'), /* update title for taxonomy */
			'add_new_item' => __('Add New age', 'tm21'), /* add new title for taxonomy */
			'new_item_name' => __('New age', 'tm21') /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
		'rewrite' => array('slug' => 'age'),
	)
);
register_taxonomy(
	'type',
	array('course','teacher'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array(
		'hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __('Types', 'tm21'), /* name of the custom taxonomy */
			'singular_name' => __('Type', 'tm21'), /* single taxonomy name */
			'search_items' =>  __('Search types', 'tm21'), /* search title for taxomony */
			'all_items' => __('All types', 'tm21'), /* all title for taxonomies */
			'parent_item' => __('Parent type', 'tm21'), /* parent title for taxonomy */
			'parent_item_colon' => __('Parent type:', 'tm21'), /* parent taxonomy title */
			'edit_item' => __('Edit type', 'tm21'), /* edit custom taxonomy title */
			'update_item' => __('Update type', 'tm21'), /* update title for taxonomy */
			'add_new_item' => __('Add New type', 'tm21'), /* add new title for taxonomy */
			'new_item_name' => __('New type', 'tm21') /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
		'rewrite' => array('slug' => 'type'),
	)
);




// now let's add custom tags (these act like categories)
register_taxonomy(
	'custom_tag',
	array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array(
		'hierarchical' => false,    /* if this is false, it acts like tags */
		'labels' => array(
			'name' => __('Custom Tags', 'tm21'), /* name of the custom taxonomy */
			'singular_name' => __('Custom Tag', 'tm21'), /* single taxonomy name */
			'search_items' =>  __('Search Custom Tags', 'tm21'), /* search title for taxomony */
			'all_items' => __('All Custom Tags', 'tm21'), /* all title for taxonomies */
			'parent_item' => __('Parent Custom Tag', 'tm21'), /* parent title for taxonomy */
			'parent_item_colon' => __('Parent Custom Tag:', 'tm21'), /* parent taxonomy title */
			'edit_item' => __('Edit Custom Tag', 'tm21'), /* edit custom taxonomy title */
			'update_item' => __('Update Custom Tag', 'tm21'), /* update title for taxonomy */
			'add_new_item' => __('Add New Custom Tag', 'tm21'), /* add new title for taxonomy */
			'new_item_name' => __('New Custom Tag Name', 'tm21') /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
	)
);

    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */
