<?php
/**
 * Add script async/defer
 */
function core_script_async_defer( $tag, $handle ) {
	if ( strpos( $handle, 'async' ) !== false ) {
		return str_replace( '></', ' async></', $tag );
	} else if ( strpos( $handle, 'defer' ) !== false ) {
		return str_replace( '></', ' defer></', $tag );
	} else {
		return $tag;
	}
}

add_filter( 'script_loader_tag', 'core_script_async_defer', 10, 2 );