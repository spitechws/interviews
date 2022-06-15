<?php
require_once  dirname(__FILE__, 2) . '/partials/header-app.php';
?>
<h1>Dashboard</h1>
<?php show_alert(); ?>
<script>
    get_users();
</script>
<?php
require_once  dirname(__FILE__, 2) . '/partials/footer.php';
?>