<?php
/**
 * wcanvas Boilerplate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wcanvas_Boilerplate
 */

/**
 * Automatically loaded theme features
 * If adding a new feature that should always be on, just drop the file into the directory below.
 * If your feature needs special priority, you may want to include it separately as this is not loaded in specific order
 */
$iterator = new RecursiveDirectoryIterator( __DIR__ . '/inc/automatic' );
foreach ( new RecursiveIteratorIterator( $iterator ) as $file ) {
	if ( $file->getExtension() === 'php' ) {
		require $file;
	}
}


/**
 * Enable ACF Theme Options
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug' 	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug' 	=> 'theme-general-settings',
	));
	
}

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/optional/custom-post-types.php';

/**
 * Custom menus
 */
require get_template_directory() . '/inc/optional/wp-menus.php';

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Disable Gutenberg
 */
add_action('admin_init', 'remove_textarea');
function remove_textarea() {
		remove_post_type_support( 'page', 'editor' );
}

/**
 * Custom Functions
 */
require get_template_directory() . '/inc/optional/custom-functions.php';

//ACF Fix Local JSON
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point($paths)
{

	// remove original path (optional)
	unset($paths[0]);


	// append path
	$paths[] = get_stylesheet_directory() . '/acf-json';


	// return
	return $paths;
}