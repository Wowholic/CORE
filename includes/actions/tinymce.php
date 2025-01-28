<?php

/**
 * Add extra styles to TinyMCE
 */
if ( carbon_get_theme_option( 'wowcore_tinymce_extra_styles' ) ) {
	add_filter( 'tiny_mce_before_init', function ( $settings ) {
		$wowcore_tinymce = carbon_get_theme_option( 'wowcore_tinymce_extra_styles' );
		$new_formats     = [];
		$idx             = 0;

		foreach ( $wowcore_tinymce as $style ) {
			$new_formats[ $idx ] = [
				'title' => $style['title'],
				'items' => [],
			];

			foreach ( $style['options'] as $option ) {
				$new_formats[ $idx ]['items'][] = [
					'title'   => $option['title'],
					'inline'  => 'span',
					'classes' => $option['classes'],
				];
			}

			$idx ++;
		}

		if ( isset( $settings['style_formats'] ) ) {
			$old_formats = json_decode( $settings['style_formats'] );
			$new_formats = array_merge( $new_formats, $old_formats );
		}

		$settings['style_formats'] = json_encode( $new_formats );

		return $settings;
	} );

	add_filter( 'mce_buttons_2', function ( $buttons ) {
		array_unshift( $buttons, 'styleselect' );

		return $buttons;
	} );
}

/**
 * Remove TinyMCE buttons
 */
if ( carbon_get_theme_option( 'wowcore_remove_tinymce_buttons' ) ) {
	add_filter( 'mce_buttons', 'wowcore_remove_tinymce_buttons' );
	add_filter( 'mce_buttons_2', 'wowcore_remove_tinymce_buttons' );
	function wowcore_remove_tinymce_buttons( $buttons ) {
		$remove_buttons = carbon_get_theme_option( 'wowcore_remove_tinymce_buttons' );

		foreach ( $buttons as $key => $value ) {
			if ( in_array( $value, $remove_buttons ) ) {
				unset( $buttons[ $key ] );
			}
		}

		return $buttons;
	}
}

/*
 *  Remove TinyMCE headlines
 */
if ( carbon_get_theme_option( 'wowcore_remove_tinymce_headlines' ) ) {
	$headlines_to_remove = carbon_get_theme_option( 'wowcore_remove_tinymce_headlines' );

	add_filter( 'tiny_mce_before_init', function ( $init_array ) use ( $headlines_to_remove ) {
		$default_formats = [
			'Paragraph=p',
			'Heading 1=h1',
			'Heading 2=h2',
			'Heading 3=h3',
			'Heading 4=h4',
			'Heading 5=h5',
			'Heading 6=h6',
			'Preformatted=pre',
		];

		$filtered_formats = array_filter( $default_formats, function ( $format ) use ( $headlines_to_remove ) {
			foreach ( $headlines_to_remove as $headline ) {
				if ( str_contains( $format, $headline ) ) {
					return false;
				}
			}

			return true;
		} );


		$init_array['block_formats'] = implode( ';', $filtered_formats );

		return $init_array;
	} );
}
