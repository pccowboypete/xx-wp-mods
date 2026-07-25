<?php
/**
 * Normalize login error messages.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter(
    'login_errors',
    function () {
        return 'Invalid login credentials.';
    }
);
