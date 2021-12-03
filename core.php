<?php
/**
 * Plugin Name: CORE
 * Plugin URI: https://wowholic.com
 * Description: Utility functions and options for common tasks in WordPress.
 * Version: 0.2.4
 * Author: Wowholic
 * Author URI: https://wowholic.com
 **/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CORE_LOCATION', dirname( __FILE__ ) );
define( 'CORE_LOCATION_URL', plugins_url( '', __FILE__ ) );
define( 'CORE_RECOMMENDED_PLUGINS', [
	[
		'provider' => 'wow',
		'slug'     => 'advanced-custom-fields-pro',
		'name'     => 'Advanced Custom Fields PRO',
	],
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
] );

define( 'Carbon_Fields\URL', plugin_dir_url( __FILE__ ) . 'vendor/htmlburger/carbon-fields/' );

include 'includes/utils.php';
include 'includes/boot.php';
include 'includes/settings-page.php';
