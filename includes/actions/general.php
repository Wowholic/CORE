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
 * Disable theme and plugin editors
 */
if ( carbon_get_theme_option( 'wwm_disable_file_edit' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
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
 * Change upload size limit
 */
if ( carbon_get_theme_option( 'wwm_upload_size_limit' ) ) {
	add_filter( 'upload_size_limit', 'wwm_upload_size_limit' );
	function wwm_upload_size_limit() {
		$size_in_bytes = carbon_get_theme_option( 'wwm_upload_size_limit' );
		$size_in_mb    = $size_in_bytes * 1024 * 1024;

		return $size_in_mb;
	}
}

/**
 * Hide Widgets page
 */
if ( carbon_get_theme_option( 'wwm_hide_widgets_page' ) ) {
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
