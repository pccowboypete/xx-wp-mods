<?php
/**
 * Disable XML-RPC and pingback exposure.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter( 'xmlrpc_methods', '__return_empty_array' );
add_filter( 'pings_open', '__return_false', 20, 2 );

add_filter(
    'wp_headers',
    function ( $headers ) {
        unset( $headers['X-Pingback'] );
        return $headers;
    }
);
