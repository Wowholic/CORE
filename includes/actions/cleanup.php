<?php
/**
 * Clean up WordPress defaults
 */
if ( carbon_get_theme_option( 'wowcore_cleanup_wp_defaults' ) ) {
	// Launching operation cleanup.
	add_action( 'init', 'wowcore_cleanup_head' );

	// Remove global styles and SVG filters
	add_action( 'init', 'wowcore_remove_global_style_and_svg_filters' );

	// Remove WP version from RSS.
	add_filter( 'the_generator', '__return_empty_string' );

	// Remove pesky injected css for recent comments widget.
	add_filter( 'wp_head', 'wowcore_remove_wp_widget_recent_comments_style', 1 );

	// Clean up comment styles in the head.
	add_action( 'wp_head', 'wowcore_remove_recent_comments_style', 1 );

	// Remove gutenberg block library css
	add_action( 'wp_enqueue_scripts', 'wowcore_remove_wp_block_library_css' );

	// Cleanup head
	function wowcore_cleanup_head() {
		// EditURI link.
		remove_action( 'wp_head', 'rsd_link' );

		// Category feed links.
		remove_action( 'wp_head', 'feed_links_extra', 3 );

		// Post and comment feed links.
		remove_action( 'wp_head', 'feed_links', 2 );

		// Windows Live Writer.
		remove_action( 'wp_head', 'wlwmanifest_link' );

		// Canonical.
		remove_action( 'wp_head', 'rel_canonical', 10 );

		// Shortlink.
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );

		// Links for adjacent posts.
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

		// WP version.
		remove_action( 'wp_head', 'wp_generator' );

		// Emoji detection script.
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

		// Emoji styles.
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
	}

	// Remove global styles and SVG filters
	function wowcore_remove_global_style_and_svg_filters() {
		if ( wowcore_is_plugin_active_by_slug( 'classic-editor' ) ) {
			remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
			remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
		}
	}

	// Remove injected CSS for recent comments widget.
	function wowcore_remove_wp_widget_recent_comments_style() {
		if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
			remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
		}
	}

	// Remove injected CSS from recent comments widget.
	function wowcore_remove_recent_comments_style() {
		global $wp_widget_factory;
		if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
			remove_action( 'wp_head', array(
				$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
				'recent_comments_style'
			) );
		}
	}

	// Remove gutenberg block library css
	function wowcore_remove_wp_block_library_css() {
		if ( wowcore_is_plugin_active_by_slug( 'classic-editor' ) ) {
			wp_dequeue_style( 'wp-block-library' );
		}
	}
}