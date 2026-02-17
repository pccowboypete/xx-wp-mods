<?php
/**
 * Disable wp-embed script.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action(
    'wp_footer',
    function () {
        wp_deregister_script( 'wp-embed' );
    }
);
