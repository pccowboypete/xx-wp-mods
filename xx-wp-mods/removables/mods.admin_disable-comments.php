<?php
/**
 * Disable comments site-wide (admin + frontend + feeds).
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Force comments and pings closed on all post types.
 */
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );

/**
 * Hide existing comments from frontend.
 */
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

/**
 * Remove Comments menu from admin.
 */
add_action(
    'admin_menu',
    function () {
        remove_menu_page( 'edit-comments.php' );
    }
);

/**
 * Remove comment support from all post types.
 */
add_action(
    'init',
    function () {
        foreach ( get_post_types() as $post_type ) {
            remove_post_type_support( $post_type, 'comments' );
            remove_post_type_support( $post_type, 'trackbacks' );
        }
    },
    100
);

/**
 * Remove comment meta boxes from edit screens.
 */
add_action(
    'admin_init',
    function () {
        foreach ( get_post_types() as $post_type ) {
            remove_meta_box( 'commentstatusdiv', $post_type, 'normal' );
            remove_meta_box( 'commentsdiv', $post_type, 'normal' );
        }
    }
);

/**
 * Disable comment feeds.
 */
add_filter( 'feed_links_show_comments_feed', '__return_false' );

/**
 * Block direct comment posting requests.
 */
add_action(
    'init',
    function () {
        if ( is_admin() ) {
            return;
        }

        if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['comment'] ) ) {
            wp_die( 'Comments are disabled.' );
        }
    }
);

/**
 * Remove comments menu from admin bar.
 */
add_action(
    'admin_bar_menu',
    function ( $wp_admin_bar ) {
        $wp_admin_bar->remove_node( 'comments' );
    },
    999
);
