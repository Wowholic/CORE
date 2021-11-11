<?php

if ( carbon_get_theme_option( 'wwm_disable_default_post_type' ) ) {
	// Remove Posts from WP admin panel
	add_action( 'admin_menu', function () {
		remove_menu_page( 'edit.php' );
	} );
}