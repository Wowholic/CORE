<?php

/**
 * Remove Posts from WP admin panel
 */
if ( carbon_get_theme_option( 'core_disable_default_post_type' ) ) {
	add_action( 'admin_menu', function () {
		remove_menu_page( 'edit.php' );
	} );
}

/**
 * Disable theme and plugin editors
 */
if ( carbon_get_theme_option( 'core_disable_file_edit' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

/**
 * Disable comments
 */
if ( carbon_get_theme_option( 'core_disable_comments' ) ) {
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

/**
 * Hide Widgets page
 */
if ( carbon_get_theme_option( 'core_hide_widgets_page' ) ) {
	add_action( 'admin_init', function () {
		global $pagenow;

		if ( $pagenow === 'widgets.php' ) {
			wp_redirect( admin_url() );
			exit;
		}
	} );

	add_action( 'admin_menu', function () {
		remove_submenu_page( 'themes.php', 'widgets.php' );
	} );
}

/**
 * Change upload size limit
 */
if ( carbon_get_theme_option( 'core_upload_size_limit' ) ) {
	add_filter( 'upload_size_limit', 'core_upload_size_limit' );
	function core_upload_size_limit() {
		$size_in_bytes = carbon_get_theme_option( 'core_upload_size_limit' );
		$size_in_mb    = $size_in_bytes * 1024 * 1024;

		return $size_in_mb;
	}
}
