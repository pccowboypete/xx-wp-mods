<?php

$current_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$should_forbid_admin = false;

if (strpos($current_url, "wp-admin/users.php")) {
    $should_forbid_admin = true;
}

if (strpos($current_url, "wp-admin/user-new.php")) {
    $should_forbid_admin = true;
}

if (strpos($current_url, "wp-admin/user-edit.php")) {
    $should_forbid_admin = true;
}

if ($should_forbid_admin) {
?>
    <script>
        window.location.replace("<?php echo "https://" . $_SERVER['HTTP_HOST'] . "/wp-admin"; ?>");
    </script>
<?php
}

add_action('admin_footer', function () {
?>
    <script>
        (function($) {
            $(document).ready(function() {
                $("#menu-users > .wp-submenu > li").eq(1).remove();
                $("#menu-users > .wp-submenu > li").eq(1).remove();
            });
        })(jQuery);
    </script>
<?php
});

?>