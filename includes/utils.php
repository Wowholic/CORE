<?php
/**
 * Check if a plugin is active passing only the slug
 *
 * @param $plugin_slug
 *
 * @return bool
 */
function wowcore_is_plugin_active_by_slug( $plugin_slug ): bool {
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

/**
 * Get hosting max file size
 *
 * @return string
 */
function wowcore_get_hosting_max_filesize(): string {
	$ini_size = ini_get( "upload_max_filesize" );

	if ( ! $ini_size ) {
		$ini_size = 'unknown';
	} elseif ( is_numeric( $ini_size ) ) {
		$ini_size .= ' bytes';
	} else {
		$ini_size .= 'B';
	}

	return $ini_size;
}
