<?php
/**
 * Hide this plugin from the Plugins page.
 */
add_action('admin_head', function () {
    $screen = get_current_screen();

    if (!$screen || $screen->id !== 'plugins') {
        return;
    }
    ?>
    <style>
        tr[data-slug="xx-wp-mods"] {
            display: none !important;
        }
    </style>
    <?php
});

add_action('admin_footer', function () {
    $screen = get_current_screen();

    if (!$screen || $screen->id !== 'plugins') {
        return;
    }
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const row = document.querySelector('tr[data-slug="xx-wp-mods"]');
        if (row) {
            row.remove();
        }
    });
    </script>
    <?php
});