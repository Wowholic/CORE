<?php

/**
 * Redirect categories/tags/author pages.
 * Redirect media pages to the file url.
 */
add_action( 'template_redirect', function () {
    if( is_category() || is_tag() || is_date() || is_author() ) {
        wp_redirect( '/', 301 );
        exit;
    } else if( is_attachment() ) {
        $url = wp_get_attachment_url( get_queried_object_id() );
        wp_redirect( $url, 301 );
        exit;
    }
});