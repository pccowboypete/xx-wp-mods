<?php
/**
 * Performance tweak: remove unnecessary wp_head output.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
