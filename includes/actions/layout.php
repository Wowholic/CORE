<?php

/**
 * Load spacing js script
 */
if ( carbon_get_theme_option( 'core_enable_layout_spacing' ) ) {
	add_action( 'wp_enqueue_scripts', function () {
		wp_enqueue_script( 'spacingjs-defer', CORE_PLUGIN_URL . 'assets/js/spacingjs.js', [], null, true );
	} );
}