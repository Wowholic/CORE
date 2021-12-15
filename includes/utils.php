<?php

/**
 * Get the recommended plugins
 *
 * @return string[][]
 */
function wowcore_get_recommended_plugins(): array {
	return [
		[
			'provider' => 'wp',
			'slug'     => 'classic-editor',
			'name'     => 'Classic Editor',
		],
		[
			'provider' => 'wp',
			'slug'     => 'duplicate-page',
			'name'     => 'Duplicate Page',
		],
		[
			'provider' => 'wp',
			'slug'     => 'redirection',
			'name'     => 'Redirection',
		],
		[
			'provider' => 'wp',
			'slug'     => 'svg-support',
			'name'     => 'SVG Support',
		],
		[
			'provider' => 'wp',
			'slug'     => 'updraftplus',
			'name'     => 'UpdraftPlus',
		],
		[
			'provider' => 'wp',
			'slug'     => 'webp-express',
			'name'     => 'WebP Express',
		],
		[
			'provider' => 'wp',
			'slug'     => 'wordpress-seo',
			'name'     => 'Yoast SEO',
		],
	];
}

/**
 * Download a plugin to the /plugins directory
 *
 * @param $plugin_slug
 * @param $provider
 */
function wowcore_download_plugin( $plugin_slug, $provider ) {
	if ( $provider === 'wp' ) {
		$filename = 'https://downloads.wordpress.org/plugin/' . $plugin_slug . '.zip';
	}

	file_put_contents( WP_PLUGIN_DIR . '/' . $plugin_slug . '.zip', file_get_contents( $filename ) );
}

/**
 * Extract zip file to a given location
 *
 * @param $file_location
 * @param $extract_to
 */
function wowcore_extract_zip( $file_location, $extract_to ) {
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
 *
 * @param $plugin_slug
 *
 * @return bool
 */
function wowcore_is_plugin_installed( $plugin_slug ): bool {
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

/**
 * Get install plugins html
 *
 * @return false|string
 */
function wowcore_get_install_plugins_html() {
	ob_start();
	$all_installed = true; ?>

    <strong><?php _e( 'Install recommended plugins' ) ?></strong>
    <ul id="recommended-plugins"> <?php
		foreach ( wowcore_get_recommended_plugins() as $plugin ) : ?>
            <li> <?php
				if ( ! wowcore_is_plugin_installed( $plugin['slug'] ) ) :
					$all_installed = false; ?>
                    <input id="wowcore-<?php echo $plugin['slug']; ?>" type="checkbox"
                           value="<?php echo $plugin['provider']; ?>---<?php echo $plugin['slug']; ?>" name="plugins">
                    <label for="wowcore-<?php echo $plugin['slug']; ?>"><?php echo $plugin['name']; ?></label> <?php
				else : ?>
                    <p><?php echo $plugin['name']; ?> <?php _e( 'is already installed' ) ?>.</p> <?php
				endif; ?>
            </li> <?php
		endforeach; ?>
    </ul> <?php

	if ( ! $all_installed ) : ?>
        <button id="wowcore-install-recommended-plugins"
                class="button button-primary button-large"><?php _e( 'Install' ) ?></button>
        <div class="wowcore-install-plugins-wait">
            <span class="spinner is-active"></span>
			<?php _e( 'Downloading and installing plugins. Please wait...' ) ?>
        </div> <?php
	endif;

	return ob_get_clean();
}