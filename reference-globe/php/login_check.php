<?php
require_once dirname(__FILE__,2).'/config.php';
require_once 'functions.php';

if (!empty($_POST)) {
    $sql = 'SELECT t1.*,t2.role_name FROM users as t1 LEFT JOIN roles as t2 on t1.role_id=t2.role_id WHERE t1.email=:email AND password=:password';
    $params = [
        'email' => $_POST['email'],
        'password' => md5($_POST['password'])
    ];
    $user = $db_handler->select($sql, $params);
    if (!empty($user)) {
        $_SESSION['user'] = (object)$user[0];
        header('Location:../app/dashboard.php');
    } else {
        header('Location:../index.php?msg=Invalid Login Details');
    }
} else {
    header('Location:../index.php?msg=Invalid Access');
}
