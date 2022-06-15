<?php
require_once dirname(__FILE__,2).'/config.php';
require_once 'functions.php';

if (!empty($_POST)) {
  
    $sql = 'UPDATE users SET `name`=:name, `mobile`=:mobile, `email`=:email, `address`=:address, `gender`=:gender, `dob`=:dob WHERE `user_id`=:user_id ';
    $params = [
        'user_id'=>$_SESSION['user']->user_id,
        'email'=>$_POST['email'],
        'name'=>$_POST['name'],
        'mobile'=>$_POST['mobile'],
        'address'=>$_POST['address'],
        'gender'=>$_POST['gender'],
        'dob'=>date('Y-m-d',strtotime($_POST['dob']))
    ];
    $res = $db_handler->update($sql, $params);
    if (!empty($res)) {
        $sql = 'SELECT t1.*,t2.role_name FROM users as t1 LEFT JOIN roles as t2 on t1.role_id=t2.role_id WHERE t1.user_id=:user_id';
        $params = [
            'user_id'=>$_SESSION['user']->user_id
        ];
        $user = $db_handler->select($sql, $params);
        $_SESSION['user'] = (object)$user[0];
        header('Location:../app/user-update.php?msg=Profiile updated successfully');
    } else {
        header('Location:../index.php?msg=Invalid Login Details');
    }
} else {
    header('Location:../index.php?msg=Invalid Access');
}
