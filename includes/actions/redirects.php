<?php

/**
 * Redirect selected items (categories/tags/author pages).
 */
if ( count( carbon_get_theme_option( 'wwm_redirects_home' ) ) > 0 ) {
	add_action( 'template_redirect', function () {
		$redirects_home_field = carbon_get_theme_option( 'wwm_redirects_home' );
		foreach ( $redirects_home_field as $type ) {
			if ( call_user_func( 'is_' . $type ) ) {
				wp_redirect( '/' );
			}
		}
	} );
}
