<?php
require_once dirname(__FILE__, 2) . '/config.php';
require_once APP_PATH . 'php/functions.php';
if (!empty($_SESSION['user']->user_id)) {
  header('location:' . BASE_URL . 'app/dashboard.php');
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