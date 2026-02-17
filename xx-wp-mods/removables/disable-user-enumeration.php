<?php
/**
 * Block user enumeration patterns.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Block user endpoints in REST API.
 */
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

/**
 * Redirect author archives to home.
 */
add_action(
    'template_redirect',
    function () {
        if ( is_author() ) {
            wp_redirect( home_url(), 301 );
            exit;
        }
    }
);

/**
 * Avoid account discovery via lost password message differences.
 */
add_filter(
    'lostpassword_errors',
    function () {
        return 'If the account exists, a password reset email has been sent.';
    }
);
