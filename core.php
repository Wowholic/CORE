<?php
/**
 * Plugin Name: CORE
 * Plugin URI: https://wowholic.com
 * Description: Utility functions and options for common tasks in WordPress.
 * Version: 0.1.0
 * Author: Wowholic
 * Author URI: https://wowholic.com
 **/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CORE_LOCATION', dirname( __FILE__ ) );
define( 'CORE_LOCATION_URL', plugins_url( '', __FILE__ ) );
define( 'Carbon_Fields\URL', plugin_dir_url( __FILE__ ) . 'vendor/htmlburger/carbon-fields/' );

include 'includes/boot.php';
include 'includes/settings-page.php';
