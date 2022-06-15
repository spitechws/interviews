<?php
require_once 'functions.php';
require_once 'DB.php';

$db_handler = new DB();

if (!empty($_POST)) {
    $sql = 'SELECT * FROM users WHERE email=:email AND password=:password';
    $params = [
        'email' => $_POST['email'],
        'password' => md5($_POST['password'])
    ];
    $user = $db_handler->select($sql, $params);
    if (!empty($user)) {
        $_SESSION['user'] = (object)$user;
        header('Location:../app/dashboard.php');
    } else {
        header('Location:../index.php?msg=Invalid Login Details');
    }
} else {
    header('Location:../index.php?msg=Invalid Access');
}
