<?php

if ( carbon_get_theme_option( 'core_enable_layout_spacing' ) ) {
	function core_load_spacingjs() {
		wp_enqueue_script( 'spacingjs-defer', CORE_LOCATION_URL . '/assets/js/spacingjs.js', [], null, true );
	}

	add_action( 'wp_enqueue_scripts', 'core_load_spacingjs' );
}