<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', function () {
	$container_icon = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjgxIiBoZWlnaHQ9IjI4MSIgdmlld0JveD0iMCAwIDI4MSAyODEiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMTggMEM4LjA1ODg0IDAgMCA4LjA1ODg0IDAgMThWMjYzQzAgMjcyLjk0MSA4LjA1ODg0IDI4MSAxOCAyODFIMjYzQzI3Mi45NDEgMjgxIDI4MSAyNzIuOTQxIDI4MSAyNjNWMThDMjgxIDguMDU4ODQgMjcyLjk0MSAwIDI2MyAwSDE4Wk0yMjguMTEzIDEwMC4zNDRDMjEwLjU3MiA1Ny4zMDI0IDE2Ni43OCAzOS41MjggMTI4LjA2MiA0Ni40NTU2Qzg4LjQ4NDEgNTMuNTM2OSA1NCA4Ni4yMDQyIDU0IDE0MS45MjZDNTQgMTY5LjQ3MiA2Mi43MzcxIDE5MS41NzkgNzcuMDQ3OSAyMDcuNjEyQzkxLjI2MzQgMjIzLjUzOCAxMTAuMzcyIDIzMi43OTUgMTMwLjA4IDIzNS44NDlDMTY5LjAxNSAyNDEuODgzIDIxMy4yMjEgMjIzLjc0NiAyMjguMzI1IDE4MC42MjlMMjA1LjY3NSAxNzIuNjk1QzE5NS4yMjUgMjAyLjUyNSAxNjMuOTMxIDIxNi44MDkgMTMzLjc1NSAyMTIuMTMyQzExOC45MDcgMjA5LjgzMSAxMDUuMDU3IDIwMi45NSA5NC45NTI2IDE5MS42M0M4NC45NDM4IDE4MC40MTcgNzggMTY0LjE2OCA3OCAxNDEuOTI2Qzc4IDk4LjA2ODQgMTAzLjkxNiA3NS4xNTcgMTMyLjI4OSA3MC4wODA0QzE2MS41MiA2NC44NTAyIDE5My4yMjggNzguMzM4NyAyMDUuODg3IDEwOS40MDJMMjI4LjExMyAxMDAuMzQ0Wk0xNjMuNjQ2IDEwNy41NDFDMTU3LjkzNiAxMDQuMzA4IDE1MS42NDEgMTAyLjY5MSAxNDQuNzYxIDEwMi42OTFDMTM3Ljg4MiAxMDIuNjkxIDEzMS41NTMgMTA0LjMwOCAxMjUuNzc0IDEwNy41NDFDMTIwLjA2NCAxMTAuNzA2IDExNS41MjMgMTE1LjE0MyAxMTIuMTUyIDEyMC44NTNDMTA4Ljc4MSAxMjYuNTYzIDEwNy4wOTYgMTMyLjk5NiAxMDcuMDk2IDE0MC4xNTFDMTA3LjA5NiAxNDcuMzA1IDEwOC43ODEgMTUzLjczOCAxMTIuMTUyIDE1OS40NDhDMTE1LjUyMyAxNjUuMTU4IDEyMC4wNjQgMTY5LjYzIDEyNS43NzQgMTcyLjg2M0MxMzEuNTUzIDE3Ni4wOTYgMTM3Ljg4MiAxNzcuNzEzIDE0NC43NjEgMTc3LjcxM0MxNTEuNTcyIDE3Ny43MTMgMTU3LjgzMyAxNzYuMDk2IDE2My41NDMgMTcyLjg2M0MxNjkuMzIyIDE2OS42MyAxNzMuODYyIDE2NS4xNTggMTc3LjE2NCAxNTkuNDQ4QzE4MC41MzUgMTUzLjczOCAxODIuMjIxIDE0Ny4zMDUgMTgyLjIyMSAxNDAuMTUxQzE4Mi4yMjEgMTMyLjk5NiAxODAuNTM1IDEyNi41NjMgMTc3LjE2NCAxMjAuODUzQzE3My44NjIgMTE1LjE0MyAxNjkuMzU2IDExMC43MDYgMTYzLjY0NiAxMDcuNTQxWk0xMzQuMTMzIDEyOC4yODNDMTM2LjYwOSAxMjUuMzI1IDE0MC4xNTIgMTIzLjg0NiAxNDQuNzYxIDEyMy44NDZDMTQ5LjMwMiAxMjMuODQ2IDE1Mi44MTEgMTI1LjMyNSAxNTUuMjg3IDEyOC4yODNDMTU3Ljc2NCAxMzEuMTczIDE1OS4wMDIgMTM1LjEyOCAxNTkuMDAyIDE0MC4xNTFDMTU5LjAwMiAxNDUuMTA0IDE1Ny43NjQgMTQ5LjA2IDE1NS4yODcgMTUyLjAxOEMxNTIuODExIDE1NC45MDcgMTQ5LjMwMiAxNTYuMzUyIDE0NC43NjEgMTU2LjM1MkMxNDAuMTUyIDE1Ni4zNTIgMTM2LjYwOSAxNTQuOTA3IDEzNC4xMzMgMTUyLjAxOEMxMzEuNjU2IDE0OS4wNiAxMzAuNDE3IDE0NS4xMDQgMTMwLjQxNyAxNDAuMTUxQzEzMC40MTcgMTM1LjEyOCAxMzEuNjU2IDEzMS4xNzMgMTM0LjEzMyAxMjguMjgzWiIgZmlsbD0iI0M0QzRDNCIvPgo8L3N2Zz4K';

	$general_fields = [
		Field::make( 'checkbox', 'wowcore_cleanup_wp_defaults', __( 'Cleanup WordPress defaults' ) )
		     ->set_default_value( true ),
		Field::make( 'checkbox', 'wowcore_disable_file_edit', __( 'Disable Theme & Plugin Editors' ) )
		     ->set_default_value( true ),
		Field::make( 'checkbox', 'wowcore_disable_fse', __( 'Disable Full Site Editing' ) )
		     ->set_default_value( true ),
		Field::make( 'checkbox', 'wowcore_disable_default_post_type', __( 'Disable default Post type' ) )
		     ->set_default_value( true ),
		Field::make( 'checkbox', 'wowcore_disable_comments', __( 'Disable comments' ) )
		     ->set_default_value( true ),
		Field::make( 'checkbox', 'wowcore_hide_widgets_page', __( 'Hide Widgets page' ) )
		     ->set_default_value( true ),
		Field::make( 'checkbox', 'wowcore_encrypt_email_shortcode', __( 'Enable [email] shortcode for encrypting addresses' ) )
		     ->set_default_value( true ),
		Field::make( 'checkbox', 'wowcore_encrypt_pretty_search_url', __( 'Pretty Search URL' ) )
		     ->set_default_value( true ),
		Field::make( 'select', 'wowcore_upload_size_limit', __( 'Upload size limit' ) )
		     ->set_options( [
			     32   => '32MB',
			     64   => '64MB',
			     128  => '128MB',
			     256  => '256MB',
			     512  => '512MB',
			     1024 => '1024MB',
		     ] )
		     ->set_default_value( 256 )
		     ->set_help_text( 'Hosting provider size limit: ' . wowcore_get_hosting_max_filesize() . '. <a href="' . admin_url( 'site-health.php?tab=debug' ) . '">View more server details</a>' ),
	];

	$redirects_fields = [
		Field::make( 'set', 'wowcore_redirects_home', __( 'Redirect to home:' ) )
		     ->set_options( [
			     'category' => 'Category archives',
			     'tag'      => 'Tag archives',
			     'date'     => 'Date archives',
			     'author'   => 'Author pages',
			     'search'   => 'Search results',
		     ] )
		     ->set_default_value( array( 'category', 'tag', 'date', 'author', 'search' ) ),
		Field::make( 'checkbox', 'wowcore_redirect_media', __( 'Redirect attachment pages to the file URL' ) ),
	];

	$grid_fields = [
		Field::make( 'checkbox', 'wowcore_enable_grid', __( 'Enable Grid' ) )
		     ->set_width( 50 ),
		Field::make( 'color', 'wowcore_grid_color', __( 'Column color' ) )
		     ->set_alpha_enabled( true )
		     ->set_default_value( '#FF0000' )
		     ->set_width( 50 ),
		Field::make( 'complex', 'wowcore_grid_breakpoints', __( 'Grid' ) )
		     ->setup_labels( [
			     'plural_name'   => 'Breakpoints',
			     'singular_name' => 'Breakpoint',
		     ] )
		     ->add_fields( array(
			     Field::make( 'text', 'wowcore_grid_breakpoint', __( 'Breakpoint (px)' ) )
			          ->set_attribute( 'type', 'number' )
			          ->set_attribute( 'min', 0 )
			          ->set_default_value( '1440' )
			          ->set_width( 20 ),
			     Field::make( 'text', 'wowcore_grid_width', __( 'Container width (px)' ) )
			          ->set_attribute( 'type', 'number' )
			          ->set_attribute( 'min', 0 )
			          ->set_default_value( '1440' )
			          ->set_width( 20 ),
			     Field::make( 'text', 'wowcore_grid_padding', __( 'Container padding (px)' ) )
			          ->set_attribute( 'type', 'number' )
			          ->set_attribute( 'min', 0 )
			          ->set_default_value( '32' )
			          ->set_width( 20 ),
			     Field::make( 'text', 'wowcore_grid_columns', __( 'Number of columns' ) )
			          ->set_attribute( 'type', 'number' )
			          ->set_attribute( 'min', 0 )
			          ->set_default_value( '12' )
			          ->set_width( 20 ),
			     Field::make( 'text', 'wowcore_grid_gutter', __( 'Gutter (px)' ) )
			          ->set_attribute( 'type', 'number' )
			          ->set_attribute( 'min', 0 )
			          ->set_default_value( '32' )
			          ->set_width( 20 ),
		     ) ),
	];

	$layout_fields = [
		Field::make( 'checkbox', 'wowcore_enable_layout_spacing', __( 'Enable layout spacing' ) )
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
			Field::make( 'checkbox', 'wowcore_enable_theme_options', __( 'Enable ACF Theme Options' ) )->set_default_value( true ),
			Field::make( 'checkbox', 'wowcore_enable_shortcodes', __( 'Enable shortcodes in Excerpts, Text and Textarea fields' ) ),
			Field::make( 'checkbox', 'wowcore_hide_acf_menu', __( 'Hide ACF menu for non-admins' ) ),
		];

		if ( acf_get_setting( 'pro' ) ) {
			$acf_header_template = '
		    <% if (flexible_content_name) { %>
		        <%- flexible_content_name %>
		    <% } %>
		    ';

			$acf_fields[] = Field::make( 'complex', 'wowcore_acf_flexible_contents', __( 'Add label next to Flexible Content Layout name' ) )
			                     ->setup_labels( [
				                     'plural_name'   => 'Flexible Contents',
				                     'singular_name' => 'Flexible Content',
			                     ] )
			                     ->add_fields( [
				                     Field::make( 'text', 'flexible_content_name', __( 'Flexible Content Name' ) )
				                          ->set_width( 50 ),
				                     Field::make( 'text', 'title_field_name', __( 'Title Field Name' ) )
				                          ->set_width( 50 ),
			                     ] )
			                     ->set_header_template( $acf_header_template )
			                     ->set_collapsed( true );
		}

		$container->add_tab( __( 'ACF' ), $acf_fields );
	}

	if ( wowcore_is_plugin_active_by_slug( 'classic-editor' ) ) {
		$tinymce_header_template = '
	    <% if (title) { %>
	        <%- title %>
	    <% } %>
	    ';

		$tinymce_fields = [
			Field::make( 'complex', 'wowcore_tinymce_extra_styles', __( 'Formats' ) )
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
			Field::make( 'set', 'wowcore_remove_tinymce_buttons', __( 'Buttons to remove' ) )
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
			Field::make( 'set', 'wowcore_remove_tinymce_headlines', __( 'Headlines to remove' ) )
			     ->set_options( [
				     'h1'  => 'H1',
				     'h2'  => 'H2',
				     'h3'  => 'H3',
				     'h4'  => 'H4',
				     'h5'  => 'H5',
				     'h6'  => 'H6',
				     'pre' => 'Preformatted',
			     ] )
			     ->set_default_value( [
				     'pre',
			     ] ),
		];

		$container->add_tab( __( 'TinyMCE' ), $tinymce_fields );
	}
} );

add_action( 'carbon_fields_fields_registered', function () {
	require_once( WOWCORE_PLUGIN_PATH . 'includes/actions/filters.php' );
	require_once( WOWCORE_PLUGIN_PATH . 'includes/actions/cleanup.php' );
	require_once( WOWCORE_PLUGIN_PATH . 'includes/actions/general.php' );
	require_once( WOWCORE_PLUGIN_PATH . 'includes/actions/redirects.php' );
	require_once( WOWCORE_PLUGIN_PATH . 'includes/actions/grid.php' );
	require_once( WOWCORE_PLUGIN_PATH . 'includes/actions/layout.php' );
	require_once( WOWCORE_PLUGIN_PATH . 'includes/actions/tinymce.php' );
	require_once( WOWCORE_PLUGIN_PATH . 'includes/actions/acf.php' );
} );