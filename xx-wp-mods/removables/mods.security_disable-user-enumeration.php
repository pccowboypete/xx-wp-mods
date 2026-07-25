<?php
/**
 * Disable user enumeration via REST API and author archives.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter(
    'rest_endpoints',
    function ( $endpoints ) {
        if ( isset( $endpoints['/wp/v2/users'] ) ) {
            unset( $endpoints['/wp/v2/users'] );
        }

        if ( isset( $endpoints['/wp/v2/users/(?P<id>[\\d]+)'] ) ) {
            unset( $endpoints['/wp/v2/users/(?P<id>[\\d]+)'] );
        }

        return $endpoints;
    }
);

add_action(
    'template_redirect',
    function () {
        if ( is_author() ) {
            wp_redirect( home_url(), 301 );
            exit;
        }
    }
);
