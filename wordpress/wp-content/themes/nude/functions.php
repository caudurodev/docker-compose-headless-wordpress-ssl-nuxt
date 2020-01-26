<?php

/**
 * The theme setup function.
 * 
 * @since 1.0
 */
function nude_setup() {

	// Set text domain.
	load_theme_textdomain( 'nude', get_template_directory() . '/languages' );

	// Add theme support.
	add_theme_support( 'html5' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background', array( 'default-color' => 'eeeeee' ) );

	// Set content width.
	$GLOBALS['content_width'] = 768;

	/**
	 * Fires after the theme setup has finished.
	 * 
	 * @since 1.0
	 */
	do_action( 'nude_theme_setup' );

}

add_action( 'after_setup_theme', 'nude_setup', 10, 0 );

