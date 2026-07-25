<?php
/**
 * Security hardening tweaks.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter( 'the_generator', '__return_empty_string' );

if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
    define( 'DISALLOW_FILE_EDIT', true );
}
