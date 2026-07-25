<?php
// Add fade-in CSS to the <head>
function xx_page_load_fade_in_css() {
    ?>
    <style>
        body {
            opacity: 0;
            transition: opacity .5s ease;
        }

        body.page-loaded {
            opacity: 1;
        }
    </style>
    <?php
}
add_action('wp_head', 'xx_page_load_fade_in_css');

// Add fade-in JavaScript to the footer
function xx_page_load_fade_in_js() {
    ?>
    <script>
        window.addEventListener('load', function () {
            document.body.classList.add('page-loaded');
        });
    </script>
    <?php
}
add_action('wp_footer', 'xx_page_load_fade_in_js');