<?php
/**
 * Plugin Name: CORE
 * Plugin URI: https://wowholic.com
 * Description: Utility functions and options for common tasks in WordPress.
 * Version: 0.2.5
 * Author: Wowholic
 * Author URI: https://wowholic.com
 **/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CORE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'CORE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

define( 'Carbon_Fields\URL', CORE_PLUGIN_URL . 'vendor/htmlburger/carbon-fields/' );

require_once( CORE_PLUGIN_PATH . 'includes/utils.php' );
require_once( CORE_PLUGIN_PATH . 'includes/boot.php' );
require_once( CORE_PLUGIN_PATH . 'includes/settings-page.php' );
