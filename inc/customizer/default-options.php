<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 */


// Return theme options
function momentous_theme_options() {
    
	// Merge Theme Options Array from Database with Default Options Array
	$theme_options = wp_parse_args( 
		
		// Get saved theme options from WP database
		get_option( 'momentous_theme_options', array() ), 
		
		// Merge with Default Options if setting was not saved yet
		momentous_default_options() 
		
	);

	// Return theme options
	return $theme_options;
	
}


// Build default options array
function momentous_default_options() {

	$default_options = array(
		'layout' 							=> 'right-sidebar',
		'latest_posts_title'				=> __( 'Latest Posts', 'momentous-lite' ),
		'footer_text'						=> '',
		'deactivate_google_fonts'			=> false,
		'header_tagline' 					=> false,
		'header_search' 					=> false,
		'header_icons' 						=> false,
		'post_layout'						=> 'index',
		'post_thumbnails_index'				=> true,
		'post_thumbnails_single' 			=> true,
		'excerpt_text' 						=> true
	);
	
	return $default_options;
}


?>