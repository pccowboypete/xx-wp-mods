<?php
/**
 * Plugin Name: xx-wp-mods
 * Description: Reusable WordPress modifications loaded from the removables folder.
 * Version: 0.1.0
 * Author: xx
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$xx_wp_mods_removables_path = plugin_dir_path( __FILE__ ) . 'removables/*.php';
$xx_wp_mods_mod_files       = glob( $xx_wp_mods_removables_path );

if ( ! empty( $xx_wp_mods_mod_files ) ) {
    sort( $xx_wp_mods_mod_files );

    foreach ( $xx_wp_mods_mod_files as $xx_wp_mods_mod_file ) {
        if ( is_file( $xx_wp_mods_mod_file ) && is_readable( $xx_wp_mods_mod_file ) ) {
            require_once $xx_wp_mods_mod_file;
        }
    }
}
