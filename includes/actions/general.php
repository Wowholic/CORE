<?php

/**
 * Remove Posts from WP admin panel
 */
if ( carbon_get_theme_option( 'wwm_disable_default_post_type' ) ) {
	add_action( 'admin_menu', function () {
		remove_menu_page( 'edit.php' );
	} );
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