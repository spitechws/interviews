<?php
require_once  dirname(__FILE__, 2) . '/partials/header-app.php';
?>
<h1>Dashboard</h1>
<?php show_alert(); ?>
<div id="user_data"></div>
<script>
    get_users('user_data');
</script>
<?php
require_once  dirname(__FILE__, 2) . '/partials/footer.php';
?>