<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'wwm_attach_page' );
function wwm_attach_page() {
	$general_fields = [
		Field::make( 'checkbox', 'wwm_cleanup_wp_defaults', __( 'Cleanup WordPress defaults' ) )->set_default_value( true ),
		Field::make( 'checkbox', 'wwm_disable_file_edit', __( 'Disable Theme & Plugin Editors' ) )->set_default_value( true ),
		Field::make( 'checkbox', 'wwm_enable_theme_options', __( 'Enable ACF Theme Options' ) )->set_default_value( true ),
		Field::make( 'checkbox', 'wwm_disable_default_post_type', __( 'Disable default Post type' ) ),
		Field::make( 'checkbox', 'wwm_disable_comments', __( 'Disable comments' ) ),
		Field::make( 'checkbox', 'wwm_hide_acf_menu', __( 'Hide ACF menu for non-admins' ) ),
	];

	$redirects_fields = [
		Field::make( 'set', 'wwm_redirects_home', __( 'Redirect to home:' ) )
		     ->set_options( array(
			     'category' => 'Category archives',
			     'tag'      => 'Tag archives',
			     'date'     => 'Date archives',
			     'author'   => 'Author pages',
		     ) ),
		Field::make( 'checkbox', 'wwm_redirect_media', __( 'Redirect attachment pages to the file URL' ) ),
	];

	Container::make( 'theme_options', __( 'Wowholic' ) )
	         ->set_icon( 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjUzIiBoZWlnaHQ9IjI1MyIgdmlld0JveD0iMCAwIDI1MyAyNTMiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMzEgMEMxMy44NzkyIDAgMCAxMy44NzkyIDAgMzFWMjIyQzAgMjM5LjEyMSAxMy44NzkyIDI1MyAzMSAyNTNIMjIyQzIzOS4xMjEgMjUzIDI1MyAyMzkuMTIxIDI1MyAyMjJWMzFDMjUzIDEzLjg3OTIgMjM5LjEyMSAwIDIyMiAwSDMxWk03MS42NzU4IDE5OC4xMUM3My4wNzg5IDE5OS4zNyA3NC45NzMgMjAwIDc3LjM1ODIgMjAwSDk3LjM1MTZDMTAxLjI4IDIwMCAxMDMuODc2IDE5OC4xOCAxMDUuMTM5IDE5NC41NEwxMjYuMzk1IDEzNC40OEwxNDcuNjUxIDE5NC41NEMxNDguMjEyIDE5NS45NCAxNDkuMTI0IDE5Ny4yIDE1MC4zODcgMTk4LjMyQzE1MS42NSAxOTkuNDQgMTUzLjQwNCAyMDAgMTU1LjY0OCAyMDBIMTc1LjY0MkMxNzcuODg3IDIwMCAxNzkuNzExIDE5OS4zNyAxODEuMTE0IDE5OC4xMUMxODIuNjU3IDE5Ni43MSAxODMuNTY5IDE5NS4wMyAxODMuODUgMTkzLjA3TDIwNi43OSA1OC44OEwyMDcgNTcuNDFDMjA3IDU2LjI5IDIwNi41MDkgNTUuMzEgMjA1LjUyNyA1NC40N0MyMDQuNjg1IDUzLjQ5IDIwMy42MzMgNTMgMjAyLjM3IDUzSDE3Ni4yNzNDMTcyLjM0NSA1MyAxNzAuMTcgNTQuNTQgMTY5Ljc0OSA1Ny42MkwxNTYuMDY5IDEzOS41MkwxNDAuOTE2IDkxLjIyQzEzOS43OTQgODcuNDQgMTM3LjQ3OSA4NS41NSAxMzMuOTcxIDg1LjU1SDExOC44MThDMTE1LjczMiA4NS41NSAxMTMuNDE3IDg3LjQ0IDExMS44NzMgOTEuMjJMOTYuNzIwMyAxMzkuNTJMODMuMDQwNSA1Ny42MkM4Mi42MTk2IDU0LjU0IDgwLjQ0NDkgNTMgNzYuNTE2MyA1M0g1MC40MTk2QzQ5LjI5NzIgNTMgNDguMjQ0OSA1My40OSA0Ny4yNjI4IDU0LjQ3QzQ2LjQyMDkgNTUuMzEgNDYgNTYuMjkgNDYgNTcuNDFDNDYgNTcuOTcgNDYuMDcwMiA1OC40NiA0Ni4yMTA0IDU4Ljg4TDY5LjE1MDMgMTkzLjA3QzY5LjQzMDkgMTk1LjAzIDcwLjI3MjggMTk2LjcxIDcxLjY3NTggMTk4LjExWiIgZmlsbD0iI0M0QzRDNCIvPgo8L3N2Zz4K' )
	         ->where( 'current_user_capability', '=', 'manage_options' )
	         ->add_tab( __( 'General' ), $general_fields )
	         ->add_tab( __( 'Redirects' ), $redirects_fields );
}

add_action( 'carbon_fields_fields_registered', 'wwm_carbon_fields_available' );
function wwm_carbon_fields_available() {
	require_once( 'actions/actions.php' );
}
