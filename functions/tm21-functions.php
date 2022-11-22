<?php

/**
 * ACF Theme setting
 **/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}
// function my_acf_init() {
//     acf_update_setting('google_api_key', 'XXXXX');
// }
// add_action('acf/init', 'my_acf_init');


// FacetWP: Remove Facet Count onf fSelect
add_filter( 'facetwp_facet_dropdown_show_counts', '__return_false' );

/* Order facets by term order */
add_filter( 'facetwp_facet_orderby', function( $orderby, $facet ) {
	$ordered_facets = [
		'tranches_age' => 'age',
	  //   'facet_name' => 'tax_nam',
	];
	if (  $ordered_facets[$facet['name']] ) {		
		$terms = get_terms( array(
			'taxonomy' => $ordered_facets[$facet['name']],
			'hide_empty' => false,
			// 'orderby' => 'term_order', // Currently causing a bug
			'order' => 'ASC'
		));
		$termlist = [];
		foreach ($terms AS $term ) {
			$termlist[] = $term->slug;
		}
		$imploded_termlist = implode( '", "', $termlist );
		$orderby = 'FIELD(f.facet_value, "' . $imploded_termlist . '" )';
	}
	return $orderby;
  }, 11, 2);
  

/**
 * Add group block inner container.
 * The inner container has been removed in WordPress 5.8 if a theme.json
 * is available in the theme.
 * 
 * @param	string	$block_content The block content
 * @return	string The updated block content
 */
function add_block_group_inner( $block_content ) {
	libxml_use_internal_errors( true );
	$dom = new DOMDocument();
	$dom->loadHTML(
		mb_convert_encoding(
			'<html>' . $block_content . '</html>',
			'HTML-ENTITIES',
			'UTF-8'
		),
		LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
	);
	
	foreach ( $dom->getElementsByTagName( 'div' ) as $div ) {
		// check for desired class name
		if (
			strpos( $div->getAttribute( 'class' ), 'wp-block-group' ) === false
			|| strpos( $div->getAttribute( 'class' ), 'wp-block-group__inner-container' ) !== false
		) {
			continue;
		}
		
		// check if we already processed this div
		foreach ( $div->childNodes as $childNode ) {
			if (
				method_exists( $childNode, 'getAttribute' )
				&& strpos( $childNode->getAttribute( 'class' ), 'wp-block-group__inner-container' ) !== false
			) {
				continue 2;
			}
		}
		
		// create the inner container element
		$inner_container = $dom->createElement( 'div' );
		$inner_container->setAttribute( 'class', 'wp-block-group__inner-container' );
		// get all children of the current group
		$children = iterator_to_array( $div->childNodes );
		
		// append all children to the inner container
		foreach ( $children as $child ) {
			$inner_container->appendChild( $child );
		}
		
		// append new inner container to the group block
		$div->appendChild( $inner_container );
	}
	
	return str_replace( [ '<html>', '</html>' ], '', $dom->saveHTML( $dom->documentElement ) );
}
add_filter( 'render_block_core/group', 'add_block_group_inner' );