<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'core_attach_page' );
function core_attach_page() {
	$container_icon = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjUzIiBoZWlnaHQ9IjI1MyIgdmlld0JveD0iMCAwIDI1MyAyNTMiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMzEgMEMxMy44NzkyIDAgMCAxMy44NzkyIDAgMzFWMjIyQzAgMjM5LjEyMSAxMy44NzkyIDI1MyAzMSAyNTNIMjIyQzIzOS4xMjEgMjUzIDI1MyAyMzkuMTIxIDI1MyAyMjJWMzFDMjUzIDEzLjg3OTIgMjM5LjEyMSAwIDIyMiAwSDMxWk03MS42NzU4IDE5OC4xMUM3My4wNzg5IDE5OS4zNyA3NC45NzMgMjAwIDc3LjM1ODIgMjAwSDk3LjM1MTZDMTAxLjI4IDIwMCAxMDMuODc2IDE5OC4xOCAxMDUuMTM5IDE5NC41NEwxMjYuMzk1IDEzNC40OEwxNDcuNjUxIDE5NC41NEMxNDguMjEyIDE5NS45NCAxNDkuMTI0IDE5Ny4yIDE1MC4zODcgMTk4LjMyQzE1MS42NSAxOTkuNDQgMTUzLjQwNCAyMDAgMTU1LjY0OCAyMDBIMTc1LjY0MkMxNzcuODg3IDIwMCAxNzkuNzExIDE5OS4zNyAxODEuMTE0IDE5OC4xMUMxODIuNjU3IDE5Ni43MSAxODMuNTY5IDE5NS4wMyAxODMuODUgMTkzLjA3TDIwNi43OSA1OC44OEwyMDcgNTcuNDFDMjA3IDU2LjI5IDIwNi41MDkgNTUuMzEgMjA1LjUyNyA1NC40N0MyMDQuNjg1IDUzLjQ5IDIwMy42MzMgNTMgMjAyLjM3IDUzSDE3Ni4yNzNDMTcyLjM0NSA1MyAxNzAuMTcgNTQuNTQgMTY5Ljc0OSA1Ny42MkwxNTYuMDY5IDEzOS41MkwxNDAuOTE2IDkxLjIyQzEzOS43OTQgODcuNDQgMTM3LjQ3OSA4NS41NSAxMzMuOTcxIDg1LjU1SDExOC44MThDMTE1LjczMiA4NS41NSAxMTMuNDE3IDg3LjQ0IDExMS44NzMgOTEuMjJMOTYuNzIwMyAxMzkuNTJMODMuMDQwNSA1Ny42MkM4Mi42MTk2IDU0LjU0IDgwLjQ0NDkgNTMgNzYuNTE2MyA1M0g1MC40MTk2QzQ5LjI5NzIgNTMgNDguMjQ0OSA1My40OSA0Ny4yNjI4IDU0LjQ3QzQ2LjQyMDkgNTUuMzEgNDYgNTYuMjkgNDYgNTcuNDFDNDYgNTcuOTcgNDYuMDcwMiA1OC40NiA0Ni4yMTA0IDU4Ljg4TDY5LjE1MDMgMTkzLjA3QzY5LjQzMDkgMTk1LjAzIDcwLjI3MjggMTk2LjcxIDcxLjY3NTggMTk4LjExWiIgZmlsbD0iI0M0QzRDNCIvPgo8L3N2Zz4K';

	$general_fields = [
		Field::make( 'checkbox', 'core_cleanup_wp_defaults', __( 'Cleanup WordPress defaults' ) )
		     ->set_default_value( true ),
		Field::make( 'checkbox', 'core_disable_file_edit', __( 'Disable Theme & Plugin Editors' ) )
		     ->set_default_value( true ),
		Field::make( 'checkbox', 'core_disable_default_post_type', __( 'Disable default Post type' ) ),
		Field::make( 'checkbox', 'core_disable_comments', __( 'Disable comments' ) ),
		Field::make( 'checkbox', 'core_hide_widgets_page', __( 'Hide Widgets page' ) )
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

	$dev_grid_fields = [
		Field::make( 'checkbox', 'core_show_dev_grid', __( 'Show Grid' ) ),
		Field::make( 'text', 'core_dev_grid_width', __( 'Container width (px)' ) )
		     ->set_default_value( '1440' )
		     ->set_width( 20 ),
		Field::make( 'text', 'core_dev_grid_padding', __( 'Container padding (px)' ) )
		     ->set_default_value( '32' )
		     ->set_width( 20 ),
		Field::make( 'text', 'core_dev_grid_columns', __( 'Number of columns (px)' ) )
		     ->set_default_value( '12' )
		     ->set_width( 20 ),
		Field::make( 'text', 'core_dev_grid_gutter', __( 'Gutter (px)' ) )
		     ->set_default_value( '32' )
		     ->set_width( 20 ),
		Field::make( 'color', 'core_dev_grid_color', __( 'Column color' ) )
		     ->set_alpha_enabled( true )
		     ->set_default_value( '#FF0000' )
		     ->set_width( 20 ),
	];

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

	$container = Container::make( 'theme_options', __( 'Wowholic' ) )
	                      ->set_icon( 'none' ) // Or $container_icon
	                      ->where( 'current_user_capability', '=', 'manage_options' )
	                      ->add_tab( __( 'General' ), $general_fields )
	                      ->add_tab( __( 'Redirects' ), $redirects_fields )
	                      ->add_tab( __( 'Grid' ), $dev_grid_fields )
	                      ->add_tab( __( 'TinyMCE' ), $tinymce_fields );

	if ( class_exists( 'acf' ) ) {
		$acf_fields = [
			Field::make( 'checkbox', 'core_enable_theme_options', __( 'Enable ACF Theme Options' ) )->set_default_value( true ),
			Field::make( 'checkbox', 'core_enable_shortcodes', __( 'Enable shortcodes in Excerpts, Text and Textarea fields' ) ),
			Field::make( 'checkbox', 'core_hide_acf_menu', __( 'Hide ACF menu for non-admins' ) ),
		];

		$container->add_tab( __( 'ACF' ), $acf_fields );
	}
}

add_action( 'carbon_fields_fields_registered', 'core_carbon_fields_available' );
function core_carbon_fields_available() {
	require_once( 'actions/actions.php' );
}

function get_hosting_max_filesize() {
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
