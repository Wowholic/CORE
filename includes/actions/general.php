<?php

/**
 * Remove Posts from WP admin panel
 */
if ( carbon_get_theme_option( 'wowcore_disable_default_post_type' ) ) {
	add_action( 'admin_menu', function () {
		remove_menu_page( 'edit.php' );
	} );
}

/**
 * Disable theme and plugin editors
 */
if ( carbon_get_theme_option( 'wowcore_disable_file_edit' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

/**
 * Disable comments
 */
if ( carbon_get_theme_option( 'wowcore_disable_comments' ) ) {
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
if ( carbon_get_theme_option( 'wowcore_hide_widgets_page' ) ) {
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
if ( carbon_get_theme_option( 'wowcore_upload_size_limit' ) ) {
	add_filter( 'upload_size_limit', function () {
		$size_in_bytes = carbon_get_theme_option( 'wowcore_upload_size_limit' );

		return $size_in_bytes * 1024 * 1024;
	} );
}

/**
 * Email shortcode encrypt.
 */
if ( carbon_get_theme_option( 'wowcore_encrypt_email_shortcode' ) ) {
	add_shortcode( 'email', function ( $atts = [], $content = null ) {
        $atts = array_change_key_case( (array) $atts, CASE_LOWER );
        $array_atts = shortcode_atts(
            array(
                'title' => '',
            ), $atts
        );

		if ( ! is_email( $content ) ) {
			return;
		}

        if ( $array_atts['title'] ) {
            $title = esc_html__( $array_atts['title'], '' );
        }
        else {
            $title = '%s';
        }

		$content    = antispambot( $content );
		$email_link = sprintf( 'mailto:%s', $content );

		return sprintf( '<a href="%s">'  . $title . '</a>', esc_url( $email_link, array( 'mailto' ) ), esc_html( $content ) );
	} );
}

/**
 * AJAX call for installing recommended plugins.
 */
add_action( 'wp_ajax_wowcore_install_recommended_plugins', function () {
	try {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			throw new ErrorException( __( 'Not enough permissions.' ) );
		}

		$plugins = explode( ',', sanitize_text_field( $_POST['plugins'] ) );

		foreach ( $plugins as $plugin_data ) {
			$plugin_data = explode( '---', $plugin_data );
			$provider    = $plugin_data[0];
			$plugin_slug = $plugin_data[1];

			if ( ! wowcore_is_plugin_installed( $plugin_slug ) ) {
				wowcore_download_plugin( $plugin_slug, $provider );
				wowcore_extract_zip( WP_PLUGIN_DIR . '/' . $plugin_slug . '.zip', WP_PLUGIN_DIR );
			}
		}

		echo json_encode( [
			'success' => true,
		] );
	} catch ( Exception $e ) {
		echo json_encode( [
			'success' => false,
			'message' => $e->getMessage(),
		] );
	}

	wp_die();
} );
