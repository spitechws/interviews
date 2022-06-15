<?php
// include database and object files
include_once '../config.php';

function login()
{
    global $user_model;
    $data = [
        'is_error' => true,
        'message' => 'success'
    ];
    if (!empty($_POST)) {
        $sql = 'SELECT t1.*,t2.role_name FROM users as t1 LEFT JOIN roles as t2 on t1.role_id=t2.role_id WHERE t1.email=:email AND password=:password';
        $params = [
            'email' => $_POST['email'],
            'password' => md5($_POST['password'])
        ];
        $user = $user_model->fetch($sql, $params);
        if (!empty($user)) {
            $_SESSION['user'] = (object)$user[0];
            $data['is_error'] = false;
            $data['message'] = 'Login successfully';
        } else {
            $data['message'] = 'Invalid login details';
        }
    } else {
        $data['message'] = 'Data is required';
    }
    send_response($data);
}

function get_users()
{
    global $user_model;
    $data = $user_model->fetchAll();
    send_response($data);
}

function error_handler($error_no, $error)
{
    $data = [
        'error_no' => $error_no,
        'error' => $error,
    ];
    send_response($data);
}


function send_response($data)
{    
    http_response_code(200);
    echo json_encode($data);
}
