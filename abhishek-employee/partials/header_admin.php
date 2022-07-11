<?php
require_once(dirname(__FILE__, 2) . '/config.php');
if (empty($_SESSION['aUser'])) {
    header('location:../');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="<?php echo ASSETS ?>css/test.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var BASE_URL = '<?php echo BASE_URL ?>';
    </script>
    <script src="<?php echo ASSETS ?>js/app.js"></script>
</head>

<body>