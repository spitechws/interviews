<?php
require_once dirname(__FILE__, 2) . '/config.php';
require_once APP_PATH . 'php/functions.php';
if (empty($_SESSION['user']->user_id)) {
  header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Reference Globe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="<?PHP echo BASE_URL ?>assets/css/style.css" rel="stylesheet">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
    var BASE_URL = '<?php echo BASE_URL; ?>';
    var API_BASE_URL = '<?php echo API_BASE_URL; ?>';
  </script>
  <script src="<?PHP echo BASE_URL ?>assets/js/app_functions.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo BASE_URL ?>app/dashboard.php">Hi! <?php echo $_SESSION['user']->name; ?>(<?php echo $_SESSION['user']->role_name; ?>)</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <?php
          if ($db_handler->hasAccess('view')) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo BASE_URL ?>app/user/users.php">Users</a>
            </li>
          <?php } ?>

          <?php
          if ($_SESSION['user']->role_id == 3) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo BASE_URL ?>app/user/user-update.php">Update Profile</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL ?>/php/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>