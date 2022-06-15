<?php
require_once dirname(__FILE__, 2) . '/config.php';
require_once 'functions.php';

if (!empty($_POST)) {
    $user_model->user_id = $_POST['user_id'];
    $user_model->name = $_POST['name'];
    $user_model->mobile = $_POST['mobile'];
    $user_model->email = $_POST['email'];
    $user_model->gender = $_POST['gender'];
    $user_model->address = $_POST['address'];
    $user_model->dob = $_POST['dob'];
    $user_model->profile_pic = '';
    $user_model->signature = '';
    $res = $user_model->update();
    if ($res) {
        $sql = 'SELECT t1.*,t2.role_name FROM users as t1 LEFT JOIN roles as t2 on t1.role_id=t2.role_id WHERE t1.user_id=:user_id';
        $params = [
            'user_id' => $_SESSION['user']->user_id
        ];
        $user = $db_handler->select($sql, $params);
        $_SESSION['user'] = (object)$user[0];
        header('Location:../app/user/users.php?msg=User updated successfully');
    } 
} else {
    header('Location:../app/user-manage.php?msg=No data to process');
}
