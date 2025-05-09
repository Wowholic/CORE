<?php
/**
 * Plugin Name: Wowholic CORE
 * Plugin URI: https://github.com/Wowholic/CORE
 * Description: Utility functions and options for common tasks in WordPress.
 * Version: 1.1.1
 * Author: Wowholic
 * Author URI: https://wowholic.com
 **/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WOWCORE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WOWCORE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

define( 'Carbon_Fields\URL', WOWCORE_PLUGIN_URL . 'vendor/htmlburger/carbon-fields/' );

require_once( WOWCORE_PLUGIN_PATH . 'includes/utils.php' );
require_once( WOWCORE_PLUGIN_PATH . 'includes/boot.php' );
require_once( WOWCORE_PLUGIN_PATH . 'includes/settings-page.php' );
