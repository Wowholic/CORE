<?php

use Carbon_Fields\Carbon_Fields;

add_action( 'after_setup_theme', 'wwm_carbon_load' );
function wwm_carbon_load() {
	require_once( WWM_LOCATION . '/vendor/autoload.php' );
	Carbon_Fields::boot();
}
