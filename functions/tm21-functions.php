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
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyBGYVBKpzxFsQQCGqPrim3lqdN75yZp12A');
}
add_action('acf/init', 'my_acf_init');


// /**
//  * Add group block inner container.
//  * The inner container has been removed in WordPress 5.8 if a theme.json
//  * is available in the theme.
//  * 
//  * @param	string	$block_content The block content
//  * @return	string The updated block content
//  */
// function my_add_block_group_inner( $block_content ) {
// 	libxml_use_internal_errors( true );
// 	$dom = new DOMDocument();
// 	$dom->loadHTML(
// 		mb_convert_encoding(
// 			'<html>' . $block_content . '</html>',
// 			'HTML-ENTITIES',
// 			'UTF-8'
// 		),
// 		LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
// 	);
	
// 	foreach ( $dom->getElementsByTagName( 'div' ) as $div ) {
// 		// check for desired class name
// 		if (
// 			strpos( $div->getAttribute( 'class' ), 'wp-block-group' ) === false
// 			|| strpos( $div->getAttribute( 'class' ), 'wp-block-group__inner-container' ) !== false
// 		) {
// 			continue;
// 		}
		
// 		// check if we already processed this div
// 		foreach ( $div->childNodes as $childNode ) {
// 			if (
// 				method_exists( $childNode, 'getAttribute' )
// 				&& strpos( $childNode->getAttribute( 'class' ), 'wp-block-group__inner-container' ) !== false
// 			) {
// 				continue 2;
// 			}
// 		}
		
// 		// create the inner container element
// 		$inner_container = $dom->createElement( 'div' );
// 		$inner_container->setAttribute( 'class', 'wp-block-group__inner-container' );
// 		// get all children of the current group
// 		$children = iterator_to_array( $div->childNodes );
		
// 		// append all children to the inner container
// 		foreach ( $children as $child ) {
// 			$inner_container->appendChild( $child );
// 		}
		
// 		// append new inner container to the group block
// 		$div->appendChild( $inner_container );
// 	}
	
// 	return str_replace( [ '<html>', '</html>' ], '', $dom->saveHTML( $dom->documentElement ) );
// }

// add_filter( 'render_block_core/group', 'my_add_block_group_inner' );
