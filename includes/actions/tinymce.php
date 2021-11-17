<?php

/**
 * Add extra styles to TinyMCE
 */
if ( carbon_get_theme_option( 'wwm_tinymce_extra_styles' ) ) {
	add_filter( 'tiny_mce_before_init', function ( $settings ) {
		$wwm_tinymce = carbon_get_theme_option( 'wwm_tinymce_extra_styles' );
		$new_formats = [];
		$idx         = 0;

		foreach ( $wwm_tinymce as $style ) {
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
