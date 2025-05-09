<?php

/**
 * Load spacing js script
 */
if ( carbon_get_theme_option( 'wowcore_enable_layout_spacing' ) ) {
	add_action( 'wp_enqueue_scripts', function () {
		wp_enqueue_script( 'spacingjs-defer', WOWCORE_PLUGIN_URL . 'assets/js/spacing.min.js', [], null, true );
	} );
}