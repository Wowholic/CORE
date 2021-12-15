<?php

/**
 * Show grid
 */

if ( carbon_get_theme_option( 'wowcore_enable_grid' ) ) {
	/**
	 * @param $width
	 * @param $padding
	 * @param $columns
	 * @param $gutter
	 *
	 * @return string
	 */
	function wowcore_grid_generate_breakpoints( $width, $padding, $columns, $gutter ): string {
		return "
		.wowcore-grid .wowcore-grid_container {
            max-width: " . $width . "px;
            margin: 0 auto;
            padding: 0 " . $padding . "px;
        }

        .wowcore-grid .wowcore-grid_row {
            display: flex;
            margin: 0 " . $gutter / - 2 . "px;
        }

        .wowcore-grid .wowcore-grid_col {
            flex: 0 0 " . 100 / $columns . "%;
            max-width: " . 100 / $columns . "%;
            padding: 0 " . $gutter / 2 . "px;
            display: none;
        }

        .wowcore-grid .wowcore-grid_col:nth-child(-n + $columns) {
            display: block;
        }";
	}

	/**
	 * Grid base css
	 *
	 * @param $color
	 *
	 * @return string
	 */
	function wowcore_grid_base_css( $color ): string {
		return "
        .wowcore-toggle-grid {
            position: fixed;
            top: 120px;
            right: 0;
            width: 40px;
            height: 40px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border-radius: 4px 0 0 4px;
            box-shadow: 0 0 4px 0 rgba(96, 96, 96, 0.2);
            border: 0;
            z-index: 999999;
            cursor: pointer;
        }

        .wowcore-toggle-grid svg {
            width: 20px;
            height: auto;
        }

        .wowcore-toggle-grid svg:last-child {
            display: none;
        }

        .wowcore-toggle-grid.is-active svg:last-child {
            display: block;
        }

        .wowcore-toggle-grid.is-active svg:first-child {
            display: none;
        }

        .wowcore-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: 999998;
            display: none;
            pointer-events: none;
        }

        .wowcore-grid.is-active {
            display: block;
        }

        .wowcore-grid .wowcore-grid_col span {
            display: block;
            height: 100vh;
            background: $color
        }";
	}

	/**
	 * Add grid css
	 */
	function wowcore_add_grid_css() {
		$color       = carbon_get_theme_option( 'wowcore_grid_color' );
		$breakpoints = carbon_get_theme_option( 'wowcore_grid_breakpoints' );

		usort( $breakpoints, function ( $item1, $item2 ) {
			return $item1['wowcore_grid_breakpoint'] <=> $item2['wowcore_grid_breakpoint'];
		} );

		echo "<style>";

		echo esc_html( wowcore_grid_base_css( $color ) );

		for ( $i = 0; $i < count( $breakpoints ); $i ++ ) {
			$breakpoint_item = $breakpoints[ $i ];
			$width           = $breakpoint_item['wowcore_grid_width'];
			$padding         = $breakpoint_item['wowcore_grid_padding'];
			$columns         = $breakpoint_item['wowcore_grid_columns'];
			$gutter          = $breakpoint_item['wowcore_grid_gutter'];

			if ( count( $breakpoints ) > 1 ) {
				$breakpoint_min = $breakpoint_item['wowcore_grid_breakpoint'];

				if ( $i === 0 ) {
					$breakpoint_max = $breakpoints[ $i + 1 ]['wowcore_grid_breakpoint'] - 1;
					echo esc_html( "@media (max-width: " . $breakpoint_max . "px) {\n" );
				} elseif ( $i === ( count( $breakpoints ) - 1 ) ) {
					echo esc_html( "@media (min-width: " . $breakpoint_min . "px) {\n" );
				} else {
					$breakpoint_max = $breakpoints[ $i + 1 ]['wowcore_grid_breakpoint'] - 1;
					echo esc_html( "@media (min-width: " . $breakpoint_min . "px) and (max-width: " . $breakpoint_max . "px) {\n" );
				}
			}

			echo esc_html( wowcore_grid_generate_breakpoints( $width, $padding, $columns, $gutter ) );

			if ( count( $breakpoints ) > 1 ) {
				echo "}\n";
			}
		}

		echo "</style>";
	}

	/**
	 * Add grid html
	 */
	function wowcore_add_grid() {
		$breakpoints = carbon_get_theme_option( 'wowcore_grid_breakpoints' );

		usort( $breakpoints, function ( $item1, $item2 ) {
			return $item1['wowcore_grid_columns'] <=> $item2['wowcore_grid_columns'];
		} );

		$columns = end( $breakpoints )['wowcore_grid_columns'];
		?>
        <button class="wowcore-toggle-grid js-wowcore-toggle-grid is-active">
            <svg width="512px" height="350px" viewBox="0 0 512 350" version="1.1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="visibility-on_1" fill="#000000" fill-rule="nonzero">
                        <path d="M254.4,238.6 C289.4,238.6 318,210 318,175 C318,140 289.4,111.4 254.4,111.4 C219.4,111.4 190.8,140 190.8,175 C190.8,210 219.4,238.6 254.4,238.6 Z M254.4,270.4 C200.3,270.4 159,229.1 159,175 C159,120.9 200.3,79.6 254.4,79.6 C308.5,79.6 349.8,120.9 349.8,175 C349.8,229.1 308.5,270.4 254.4,270.4 Z"
                              id="Shape"></path>
                        <path d="M254.4,318.1 C343.4,318.1 416.6,270.4 473.8,171.8 C416.5,79.6 343.4,31.9 254.4,31.9 C165.3,31.9 95.4,76.4 38.1,171.8 C92.2,273.6 165.4,318.1 254.4,318.1 Z M254.4,0.1 C359.3,0.1 445.2,57.3 512,171.8 C445.2,292.7 359.4,349.9 254.4,349.9 C149.5,349.9 63.6,292.7 0,175 C63.6,60.5 146.3,0.1 254.4,0.1 Z"
                              id="Shape"></path>
                    </g>
                </g>
            </svg>
            <svg width="512px" height="510px" viewBox="0 0 512 510" version="1.1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="visibility-off_2" fill="#000000" fill-rule="nonzero">
                        <path d="M377.6,109.9 L487.5,0.2 L510,22.7 L405.3,127.3 C445.5,156 481,197.8 512,252.5 C446.9,371 361.3,430.2 255.1,430.2 C210.7,430.2 170.1,419.9 133.3,399.2 L22.5,509.8 L0,487.3 L105.9,381.5 C66.1,351.9 31.2,308.9 1.2,252.5 C64.2,137.2 148.8,79.6 255,79.6 C299.5,79.6 340.4,89.7 377.6,109.9 Z M156.8,375.6 C186.9,390.8 219.6,398.3 255,398.3 C344.1,398.3 416.8,351 475.1,252.7 C447.5,207.5 416.7,173.5 382.4,150.1 L333,199.6 C344.1,215.2 350.6,234.3 350.6,254.9 C350.6,307.7 307.8,350.5 255,350.5 C234.4,350.5 215.2,343.9 199.6,332.8 L156.8,375.6 Z M128.7,358.6 L177.1,310.3 C166,294.7 159.4,275.6 159.4,254.9 C159.4,202.1 202.2,159.3 255,159.3 C275.7,159.3 294.8,165.9 310.5,177 L353.9,133.6 C323.5,118.8 290.6,111.5 255,111.5 C165.8,111.5 94.2,157.4 37.7,252.7 C64.6,299.4 94.8,334.6 128.7,358.6 Z M222.7,309.8 C232.2,315.4 243.3,318.6 255.1,318.6 C290.3,318.6 318.8,290.1 318.8,254.9 C318.8,243.1 315.6,232 310,222.6 L222.7,309.8 Z M200.2,287.3 L287.5,200 C278,194.4 266.9,191.2 255.1,191.2 C219.9,191.2 191.4,219.7 191.4,254.9 C191.3,266.7 194.5,277.8 200.2,287.3 Z"
                              id="Shape"></path>
                    </g>
                    <g id="visibility-on_1" transform="translate(0.000000, 80.000000)" fill="#000000"
                       fill-rule="nonzero">
                        <path d="M254.4,238.6 C289.4,238.6 318,210 318,175 C318,140 289.4,111.4 254.4,111.4 C219.4,111.4 190.8,140 190.8,175 C190.8,210 219.4,238.6 254.4,238.6 Z M254.4,270.4 C200.3,270.4 159,229.1 159,175 C159,120.9 200.3,79.6 254.4,79.6 C308.5,79.6 349.8,120.9 349.8,175 C349.8,229.1 308.5,270.4 254.4,270.4 Z"
                              id="Shape"></path>
                        <path d="M254.4,318.1 C343.4,318.1 416.6,270.4 473.8,171.8 C416.5,79.6 343.4,31.9 254.4,31.9 C165.3,31.9 95.4,76.4 38.1,171.8 C92.2,273.6 165.4,318.1 254.4,318.1 Z M254.4,0.1 C359.3,0.1 445.2,57.3 512,171.8 C445.2,292.7 359.4,349.9 254.4,349.9 C149.5,349.9 63.6,292.7 0,175 C63.6,60.5 146.3,0.1 254.4,0.1 Z"
                              id="Shape"></path>
                    </g>
                </g>
            </svg>
        </button>
        <div class="wowcore-grid js-wowcore-grid is-active">
            <div class="wowcore-grid_container">
                <div class="wowcore-grid_row">
					<?php for ( $i = 0; $i < intval( $columns ); $i ++ ): ?>
                        <div class="wowcore-grid_col"><span></span></div>
					<?php endfor; ?>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', () => {
                var toggleGrid = document.querySelector('.js-wowcore-toggle-grid');
                var coreGrid = document.querySelector('.js-wowcore-grid');
                toggleGrid.addEventListener('click', () => {
                    toggleGrid.classList.toggle('is-active');
                    coreGrid.classList.toggle('is-active');
                });
            });
        </script>
		<?php
	}

	add_action( 'wp_head', 'wowcore_add_grid_css', 100 );
	add_action( 'wp_footer', 'wowcore_add_grid', 100 );
}