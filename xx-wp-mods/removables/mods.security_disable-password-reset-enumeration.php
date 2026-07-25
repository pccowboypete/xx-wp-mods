<?php
/**
 * Prevent password reset account enumeration.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter(
    'lostpassword_errors',
    function () {
        return 'If the account exists, a password reset email has been sent.';
    }
);
