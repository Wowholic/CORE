<?php

use Carbon_Fields\Carbon_Fields;

/**
 * Init Carbon Fields
 */
add_action( 'after_setup_theme', function () {
	require_once( WOWCORE_PLUGIN_PATH . 'vendor/autoload.php' );
	Carbon_Fields::boot();
} );

/**
 * Load plugin assets
 */
add_action( 'admin_enqueue_scripts', function () {
	wp_register_style( 'wowcore_styles', WOWCORE_PLUGIN_URL . 'assets/css/main.css' );
	wp_enqueue_style( 'wowcore_styles' );

	wp_register_script( 'wowcore_scripts', WOWCORE_PLUGIN_URL . 'assets/js/main.js' );
	wp_enqueue_script( 'wowcore_scripts' );
} );
