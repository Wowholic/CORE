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

/**
 * Disable comments
 */
if ( carbon_get_theme_option( 'wwm_disable_comments' ) ) {
	// Redirect any user trying to access comments page
	add_action( 'admin_init', function () {
		global $pagenow;

		if ( $pagenow === 'edit-comments.php' || $pagenow === 'options-discussion.php' ) {
			wp_redirect( admin_url() );
			exit;
		}

		// Remove comments metabox from dashboard
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

		// Disable support for comments and trackbacks in post types
		foreach ( get_post_types() as $post_type ) {
			if ( post_type_supports( $post_type, 'comments' ) ) {
				remove_post_type_support( $post_type, 'comments' );
				remove_post_type_support( $post_type, 'trackbacks' );
			}
		}
	} );

	// Close comments on the front-end
	add_filter( 'comments_open', '__return_false', 20, 2 );
	add_filter( 'pings_open', '__return_false', 20, 2 );

	// Hide existing comments
	add_filter( 'comments_array', '__return_empty_array', 10, 2 );

	// Remove comments page and option page in menu
	add_action( 'admin_menu', function () {
		remove_menu_page( 'edit-comments.php' );
		remove_submenu_page( 'options-general.php', 'options-discussion.php' );
	} );

	// Remove comments links from admin bar
	add_action( 'init', function () {
		if ( is_admin_bar_showing() ) {
			remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
		}
	} );
}
