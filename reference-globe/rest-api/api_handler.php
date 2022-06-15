<?php
// include database and object files
include_once '../config.php';

function login()
{
    global $user_model;
    $data = [
        'is_error' => 1,
        'message' => 'error'
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
            $data['is_error'] = 0;
            $data['message'] = 'Login successfully';
        } else {
            $data['message'] = 'Invalid login details';
        }
    } else {
        $data['message'] = 'Data is required';
    }
    send_response($data);
}

function register()
{
    global $user_model, $db_handler;
    $data = [
        'is_error' => 1,
        'message' => 'error'
    ];
    $isExist = $db_handler->checkUnique('users', 'email', $_POST['email']);
    if (!$isExist) {
        $isExist = $db_handler->checkUnique('users', 'email', $_POST['email']);
        if (!$isExist) {
            $user_model->name = $_POST['name'];
            $user_model->mobile = $_POST['mobile'];
            $user_model->email = $_POST['email'];
            $user_model->gender = $_POST['gender'];
            $user_model->address = $_POST['address'];
            $user_model->password = $_POST['password'];
            $user_model->dob = $_POST['dob'];
            $user_model->profile_pic = '';
            $user_model->signature = '';
            $res = $user_model->add();
            if ($res) {
                $data['is_error'] = 0;
                $data['message'] = "You are registered successfully";
            }
        } else {
            $data['message'] = "This mobile number is already registered";
        }
    } else {
        $data['message'] = "This email id is already registered";
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
