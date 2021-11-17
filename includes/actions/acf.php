<?php

/**
 * Enable Theme Options
 */
if ( carbon_get_theme_option( 'wwm_enable_theme_options' ) ) {
	add_action( 'acf/init', function () {
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page( array(
				'page_title' => __( 'Theme Options' ),
				'menu_title' => __( 'Theme Options' ),
				'menu_slug'  => 'theme-options',
			) );
		}
	} );
}

/**
 * Allow shortcodes in excerpts, textareas and text fields from ACF
 */
if ( carbon_get_theme_option( 'wwm_enable_shortcodes' ) ) {
	add_filter( 'get_the_excerpt', 'do_shortcode' );
	add_filter( 'acf/format_value/type=textarea', 'do_shortcode' );
	add_filter( 'acf/format_value/type=text', 'do_shortcode' );
}

/**
 * Hide ACF menu for non-admins
 */
if ( carbon_get_theme_option( 'wwm_hide_acf_menu' ) ) {
	add_filter( 'acf/settings/show_admin', 'wwm_custom_acf_show_admin' );
	function wwm_custom_acf_show_admin( $show ): bool {
		return current_user_can( 'manage_options' );
	}
}
