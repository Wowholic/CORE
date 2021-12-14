<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', function () {
	$container_icon = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjc4IiBoZWlnaHQ9IjI5MCIgdmlld0JveD0iMCAwIDI3OCAyOTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMzggMEMxNy4wMTMyIDAgMCAxNy4wMTMyIDAgMzhWMjUyQzAgMjcyLjk4NyAxNy4wMTMyIDI5MCAzOCAyOTBIMjQwQzI2MC45ODcgMjkwIDI3OCAyNzIuOTg3IDI3OCAyNTJWMzhDMjc4IDE3LjAxMzIgMjYwLjk4NyAwIDI0MCAwSDM4Wk0yMjYuODE3IDEwMi44NDRDMjA4LjQ2MiA1Ny44MDU3IDE2Mi42NTcgMzkuMzE2OSAxMjIuMzU3IDQ2LjUyNzVDODAuOTEyMSA1My45NDI5IDQ1IDg4LjIzNjIgNDUgMTQ1LjkzNUM0NSAxNzQuMzY1IDU0LjAzNTkgMTk3LjQ0OCA2OS4wNjM1IDIxNC4yODVDODMuOTY0NCAyMzAuOTc5IDEwMy45NSAyNDAuNjMyIDEyNC40NjcgMjQzLjgxMUMxNjQuODYyIDI1MC4wNzIgMjExLjIyMSAyMzEuMjkyIDIyNy4xIDE4NS45NjFMMTk2LjkgMTc1LjM4MkMxODcuMjI2IDIwMi45OTggMTU4LjA4NCAyMTYuNjM5IDEyOS4zNjggMjEyLjE4OUMxMTUuMzI5IDIxMC4wMTMgMTAyLjM1NiAyMDMuNTI4IDkyLjkzNyAxOTIuOTc2QzgzLjY0NSAxODIuNTY2IDc3IDE2Ny4yOTMgNzcgMTQ1LjkzNUM3NyAxMDQuMDU1IDEwMS40ODggODIuNzY5NyAxMjcuOTkzIDc4LjAyNzJDMTU1LjY0MyA3My4wOCAxODUuMzM4IDg1Ljg1NDEgMTk3LjE4MyAxMTQuOTIxTDIyNi44MTcgMTAyLjg0NFpNMTU4LjY0NiAxMTEuNTUxQzE1Mi45MzYgMTA4LjMxNyAxNDYuNjQxIDEwNi43IDEzOS43NjEgMTA2LjdDMTMyLjg4MiAxMDYuNyAxMjYuNTUzIDEwOC4zMTcgMTIwLjc3NCAxMTEuNTUxQzExNS4wNjQgMTE0LjcxNSAxMTAuNTIzIDExOS4xNTIgMTA3LjE1MiAxMjQuODYzQzEwMy43ODEgMTMwLjU3MyAxMDIuMDk2IDEzNy4wMDUgMTAyLjA5NiAxNDQuMTZDMTAyLjA5NiAxNTEuMzE1IDEwMy43ODEgMTU3Ljc0NyAxMDcuMTUyIDE2My40NTdDMTEwLjUyMyAxNjkuMTY3IDExNS4wNjQgMTczLjYzOSAxMjAuNzc0IDE3Ni44NzJDMTI2LjU1MyAxODAuMTA2IDEzMi44ODIgMTgxLjcyMiAxMzkuNzYxIDE4MS43MjJDMTQ2LjU3MiAxODEuNzIyIDE1Mi44MzMgMTgwLjEwNiAxNTguNTQzIDE3Ni44NzJDMTY0LjMyMiAxNzMuNjM5IDE2OC44NjIgMTY5LjE2NyAxNzIuMTY0IDE2My40NTdDMTc1LjUzNSAxNTcuNzQ3IDE3Ny4yMjEgMTUxLjMxNSAxNzcuMjIxIDE0NC4xNkMxNzcuMjIxIDEzNy4wMDUgMTc1LjUzNSAxMzAuNTczIDE3Mi4xNjQgMTI0Ljg2M0MxNjguODYyIDExOS4xNTIgMTY0LjM1NiAxMTQuNzE1IDE1OC42NDYgMTExLjU1MVpNMTI5LjEzMyAxMzIuMjkyQzEzMS42MDkgMTI5LjMzNCAxMzUuMTUyIDEyNy44NTUgMTM5Ljc2MSAxMjcuODU1QzE0NC4zMDIgMTI3Ljg1NSAxNDcuODExIDEyOS4zMzQgMTUwLjI4NyAxMzIuMjkyQzE1Mi43NjQgMTM1LjE4MiAxNTQuMDAyIDEzOS4xMzggMTU0LjAwMiAxNDQuMTZDMTU0LjAwMiAxNDkuMTEzIDE1Mi43NjQgMTUzLjA2OSAxNTAuMjg3IDE1Ni4wMjdDMTQ3LjgxMSAxNTguOTE3IDE0NC4zMDIgMTYwLjM2MSAxMzkuNzYxIDE2MC4zNjFDMTM1LjE1MiAxNjAuMzYxIDEzMS42MDkgMTU4LjkxNyAxMjkuMTMzIDE1Ni4wMjdDMTI2LjY1NiAxNTMuMDY5IDEyNS40MTcgMTQ5LjExMyAxMjUuNDE3IDE0NC4xNkMxMjUuNDE3IDEzOS4xMzggMTI2LjY1NiAxMzUuMTgyIDEyOS4xMzMgMTMyLjI5MloiIGZpbGw9IiNDNEM0QzQiLz4KPC9zdmc+Cg==';

	$general_fields = [
		Field::make( 'checkbox', 'core_cleanup_wp_defaults', __( 'Cleanup WordPress defaults' ) )
		     ->set_default_value( true ),
		Field::make( 'checkbox', 'core_disable_file_edit', __( 'Disable Theme & Plugin Editors' ) )
		     ->set_default_value( true ),
		Field::make( 'checkbox', 'core_disable_default_post_type', __( 'Disable default Post type' ) ),
		Field::make( 'checkbox', 'core_disable_comments', __( 'Disable comments' ) ),
		Field::make( 'checkbox', 'core_hide_widgets_page', __( 'Hide Widgets page' ) )
		     ->set_default_value( true ),
		Field::make( 'checkbox', 'core_encrypt_email_shortcode', __( 'Enable [email] shortcode for encrypting addresses' ) )
		     ->set_default_value( true ),
		Field::make( 'select', 'core_upload_size_limit', __( 'Upload size limit' ) )
		     ->set_options( [
			     32   => '32MB',
			     64   => '64MB',
			     128  => '128MB',
			     256  => '256MB',
			     512  => '512MB',
			     1024 => '1024MB',
		     ] )
		     ->set_default_value( 256 )
		     ->set_help_text( 'Hosting provider size limit: ' . get_hosting_max_filesize() . '. <a href="' . admin_url( 'site-health.php?tab=debug' ) . '">View more server details</a>' ),
		Field::make( 'html', 'core_install_plugins', __( 'Install recommended plugins' ) )
		     ->set_html( 'get_install_plugins_html' ),
	];

	$redirects_fields = [
		Field::make( 'set', 'core_redirects_home', __( 'Redirect to home:' ) )
		     ->set_options( [
			     'category' => 'Category archives',
			     'tag'      => 'Tag archives',
			     'date'     => 'Date archives',
			     'author'   => 'Author pages',
		     ] ),
		Field::make( 'checkbox', 'core_redirect_media', __( 'Redirect attachment pages to the file URL' ) ),
	];

	$grid_fields = [
		Field::make( 'checkbox', 'core_enable_grid', __( 'Enable Grid' ) )
		     ->set_width( 50 ),
		Field::make( 'color', 'core_grid_color', __( 'Column color' ) )
		     ->set_alpha_enabled( true )
		     ->set_default_value( '#FF0000' )
		     ->set_width( 50 ),
		Field::make( 'complex', 'core_grid_breakpoints', __( 'Grid' ) )
		     ->setup_labels( [
			     'plural_name'   => 'Breakpoints',
			     'singular_name' => 'Breakpoint',
		     ] )
		     ->add_fields( array(
			     Field::make( 'text', 'core_grid_breakpoint', __( 'Breakpoint (px)' ) )
			          ->set_attribute( 'type', 'number' )
			          ->set_attribute( 'min', 0 )
			          ->set_default_value( '1440' )
			          ->set_width( 20 ),
			     Field::make( 'text', 'core_grid_width', __( 'Container width (px)' ) )
			          ->set_attribute( 'type', 'number' )
			          ->set_attribute( 'min', 0 )
			          ->set_default_value( '1440' )
			          ->set_width( 20 ),
			     Field::make( 'text', 'core_grid_padding', __( 'Container padding (px)' ) )
			          ->set_attribute( 'type', 'number' )
			          ->set_attribute( 'min', 0 )
			          ->set_default_value( '32' )
			          ->set_width( 20 ),
			     Field::make( 'text', 'core_grid_columns', __( 'Number of columns (px)' ) )
			          ->set_attribute( 'type', 'number' )
			          ->set_attribute( 'min', 0 )
			          ->set_default_value( '12' )
			          ->set_width( 20 ),
			     Field::make( 'text', 'core_grid_gutter', __( 'Gutter (px)' ) )
			          ->set_attribute( 'type', 'number' )
			          ->set_attribute( 'min', 0 )
			          ->set_default_value( '32' )
			          ->set_width( 20 ),
		     ) ),
	];

	$layout_fields = [
		Field::make( 'checkbox', 'core_enable_layout_spacing', __( 'Enable layout spacing' ) )
		     ->set_help_text( 'Press Alt on Windows or ⌥ Option on a Mac.' )
	];

	$container = Container::make( 'theme_options', __( 'CORE' ) )
	                      ->set_icon( $container_icon ) // Or $container_icon
	                      ->where( 'current_user_capability', '=', 'manage_options' )
	                      ->add_tab( __( 'General' ), $general_fields )
	                      ->add_tab( __( 'Redirects' ), $redirects_fields )
	                      ->add_tab( __( 'Grid' ), $grid_fields )
	                      ->add_tab( __( 'Layout' ), $layout_fields );

	if ( class_exists( 'acf' ) ) {
		$acf_fields = [
			Field::make( 'checkbox', 'core_enable_theme_options', __( 'Enable ACF Theme Options' ) )->set_default_value( true ),
			Field::make( 'checkbox', 'core_enable_shortcodes', __( 'Enable shortcodes in Excerpts, Text and Textarea fields' ) ),
			Field::make( 'checkbox', 'core_hide_acf_menu', __( 'Hide ACF menu for non-admins' ) ),
		];

		$container->add_tab( __( 'ACF' ), $acf_fields );
	}

	if ( is_plugin_active_by_slug( 'classic-editor' ) ) {
		$tinymce_header_template = '
	    <% if (title) { %>
	        <%- title %>
	    <% } %>
	    ';

		$tinymce_fields = [
			Field::make( 'complex', 'core_tinymce_extra_styles', __( 'Formats' ) )
			     ->setup_labels( [
				     'plural_name'   => 'Styles',
				     'singular_name' => 'Style',
			     ] )
			     ->add_fields( [
				     Field::make( 'text', 'title', __( 'Style Title' ) ),
				     Field::make( 'complex', 'options', __( 'Options' ) )
				          ->setup_labels( [
					          'plural_name'   => 'Options',
					          'singular_name' => 'Option',
				          ] )
				          ->add_fields( [
					          Field::make( 'text', 'title', __( 'Option Title' ) ),
					          Field::make( 'text', 'classes', __( 'Option Classes' ) ),
				          ] )
				          ->set_header_template( $tinymce_header_template )
				          ->set_collapsed( true ),
			     ] )
			     ->set_header_template( $tinymce_header_template )
			     ->set_collapsed( true ),
			Field::make( 'set', 'core_remove_tinymce_buttons', __( 'Buttons to remove' ) )
			     ->set_options( [
				     'bold'          => 'Bold',
				     'italic'        => 'Italic',
				     'bullist'       => 'Bulleted list',
				     'numlist'       => 'Numbered list',
				     'blockquote'    => 'Blockquote',
				     'alignleft'     => 'Align left',
				     'aligncenter'   => 'Align center',
				     'alignright'    => 'Align right',
				     'link'          => 'Add link',
				     'unlink'        => 'Remove link',
				     'wp_more'       => 'Read more',
				     'wp_adv'        => 'Second row toggle (if checked, second row will always display)',
				     'strikethrough' => 'Strikethrough',
				     'hr'            => 'Horizontal line',
				     'forecolor'     => 'Text color',
				     'pastetext'     => 'Paste as text',
				     'removeformat'  => 'Clear formatting',
				     'charmap'       => 'Special characters',
				     'outdent'       => 'Outdent',
				     'indent'        => 'Indent',
				     'undo'          => 'Undo',
				     'redo'          => 'Redo',
				     'wp_help'       => 'Keyboard shortcuts',
			     ] )
			     ->set_default_value( [
				     'blockquote',
				     'alignleft',
				     'aligncenter',
				     'alignright',
				     'wp_more',
				     'wp_adv',
				     'strikethrough',
				     'hr',
				     'forecolor',
				     'pastetext',
				     'removeformat',
				     'outdent',
				     'indent',
			     ] ),
		];

		$container->add_tab( __( 'TinyMCE' ), $tinymce_fields );
	}
} );

add_action( 'carbon_fields_fields_registered', function () {
	require_once( CORE_PLUGIN_PATH . 'includes/actions/filters.php' );
	require_once( CORE_PLUGIN_PATH . 'includes/actions/cleanup.php' );
	require_once( CORE_PLUGIN_PATH . 'includes/actions/general.php' );
	require_once( CORE_PLUGIN_PATH . 'includes/actions/redirects.php' );
	require_once( CORE_PLUGIN_PATH . 'includes/actions/grid.php' );
	require_once( CORE_PLUGIN_PATH . 'includes/actions/layout.php' );
	require_once( CORE_PLUGIN_PATH . 'includes/actions/tinymce.php' );
	require_once( CORE_PLUGIN_PATH . 'includes/actions/acf.php' );
} );