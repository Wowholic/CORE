<?php

/**
 * Redirect selected items (categories/tags/author pages).
 */
if ( count( carbon_get_theme_option( 'wowcore_redirects_home' ) ?? [] ) > 0 ) {
	add_action( 'template_redirect', function () {
		$redirects_home_field = carbon_get_theme_option( 'wowcore_redirects_home' ) ?: [];
		foreach ( $redirects_home_field as $type ) {
			if ( ($type === 'search' && is_search()) || (function_exists( 'is_' . $type ) && call_user_func( 'is_' . $type )) ) {
				wp_redirect( home_url(), 301 );
				exit;
			}
		}
	} );
}

/**
 * Redirect attachment pages to the file URL
 */
if ( carbon_get_theme_option( 'wowcore_redirect_media' ) ) {
	add_action( 'template_redirect', function () {
		if ( is_attachment() ) {
			$url = wp_get_attachment_url( get_queried_object_id() );
			wp_redirect( $url, 301 );
			exit;
		}
	} );
}
