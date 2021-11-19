<?php

use Carbon_Fields\Carbon_Fields;

/**
 * Init Carbon Fields
 */
add_action( 'after_setup_theme', 'core_carbon_load' );
function core_carbon_load() {
	require_once( CORE_LOCATION . '/vendor/autoload.php' );
	Carbon_Fields::boot();
}

/**
 * Load plugin assets
 */
add_action( 'admin_enqueue_scripts', 'core_load_assets' );
function core_load_assets() {
	wp_register_style( 'core_styles', CORE_LOCATION_URL . '/assets/css/main.css' );
	wp_enqueue_style( 'core_styles' );

	wp_register_script( 'core_scripts', CORE_LOCATION_URL . '/assets/js/main.js' );
	wp_enqueue_script( 'core_scripts' );
}
