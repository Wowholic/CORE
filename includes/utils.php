<?php

/**
 * Download a plugin to the /plugins directory
 */
function download_plugin( $plugin_slug, $provider ) {
	if ( $provider === 'wp' ) {
		$filename = 'https://downloads.wordpress.org/plugin/' . $plugin_slug . '.zip';
	} else if ( $provider === 'wow' ) {
		$filename = 'https://core.wowholic.com/plugin-archive/' . $plugin_slug . '.zip';
	}

	file_put_contents( WP_PLUGIN_DIR . '/' . $plugin_slug . '.zip', file_get_contents( $filename ) );
}

/**
 * Extract zip file to a given location
 */
function extract_zip( $file_location, $extract_to ) {
	if ( ! file_exists( $file_location ) ) {
		return;
	}

	$zip      = new ZipArchive;
	$did_open = $zip->open( $file_location );
	if ( $did_open === true ) {
		$zip->extractTo( $extract_to );
		$zip->close();
		unlink( $file_location );
	}
}

/**
 * Check if a plugin is installed (not necessarily activated)
 */
function is_plugin_installed( $plugin_slug ) {
	if ( ! function_exists( 'is_plugin_active' ) ) {
		include_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	}

	foreach ( get_plugins() as $installed_plugin_slug => $installed_plugin_data ) {
		if ( strpos( $installed_plugin_slug, $plugin_slug ) !== false ) {
			return true;
		}
	}

	return false;
}

/**
 * Check if a plugin is active passing only the slug
 */
function is_plugin_active_by_slug( $plugin_slug ) {
	if ( ! function_exists( 'is_plugin_active' ) ) {
		include_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	}

	foreach ( get_plugins() as $installed_plugin_slug => $installed_plugin_data ) {
		if ( is_plugin_active( $installed_plugin_slug ) ) {
			if ( strpos( $installed_plugin_slug, $plugin_slug ) !== false ) {
				return true;
			}
		}
	}

	return false;
}
