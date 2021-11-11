<?php

use Carbon_Fields\Carbon_Fields;

/**
 * Init Carbon Fields
 */
add_action( 'after_setup_theme', 'wwm_carbon_load' );
function wwm_carbon_load() {
	require_once( WWM_LOCATION . '/vendor/autoload.php' );
	Carbon_Fields::boot();
}

/**
 * Load plugin assets
 */
add_action( 'admin_enqueue_scripts', 'wwm_load_assets' );
function wwm_load_assets() {
	wp_register_style( 'wwm_styles', WWM_LOCATION_URL . '/assets/main.css' );
	wp_enqueue_style( 'wwm_styles' );
}