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
            $user = (object)$user[0];
            if ($user->status == '1') {
                $_SESSION['user'] = $user;
                $data['is_error'] = 0;
                $data['message'] = 'Login successfully';
            } else {
                $data['message'] = 'Your account is waiting for admin approval';
            }
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
    if (!is_valid_mobile($_POST['mobile'])) {
        $data['message'] = "Invalid mobile number format";
        send_response($data);
    }
    if (!is_valid_email($_POST['email'])) {
        $data['message'] = "Invalid email id format";
        send_response($data);
    }

    $isExist = $db_handler->checkUnique('users', 'email', $_POST['email']);
    if (!$isExist) {
        $isExist = $db_handler->checkUnique('users', 'mobile', $_POST['mobile']);
        if (!$isExist) {
            $signature = upload_file('signature');
            $profile_pic = upload_file('profile_pic');
            $user_model->name = $_POST['name'];
            $user_model->mobile = $_POST['mobile'];
            $user_model->email = $_POST['email'];
            $user_model->gender = $_POST['gender'];
            $user_model->address = $_POST['address'];
            $user_model->password = $_POST['password'];
            $user_model->dob = $_POST['dob'];
            $user_model->profile_pic = $profile_pic;
            $user_model->signature =  $signature;
            $user_model->status = 0;
            $user_model->role_id = 3;
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

function add_user()
{
    global $user_model, $db_handler;
    $data = [
        'is_error' => 1,
        'message' => 'error'
    ];
    if (!is_valid_mobile($_POST['mobile'])) {
        $data['message'] = "Invalid mobile number format";
        send_response($data);
    }
    if (!is_valid_email($_POST['email'])) {
        $data['message'] = "Invalid email id format";
        send_response($data);
    }

    $isExist = $db_handler->checkUnique('users', 'email', $_POST['email']);
    if (!$isExist) {
        $isExist = $db_handler->checkUnique('users', 'mobile', $_POST['mobile']);
        if (!$isExist) {

            $signature = upload_file('signature');
            $profile_pic = upload_file('profile_pic');

            $user_model->name = $_POST['name'];
            $user_model->mobile = $_POST['mobile'];
            $user_model->email = $_POST['email'];
            $user_model->gender = $_POST['gender'];
            $user_model->address = $_POST['address'];
            $user_model->password = $_POST['password'];
            $user_model->dob = $_POST['dob'];
            $user_model->profile_pic = $profile_pic;
            $user_model->signature =  $signature;
            $user_model->status = 1;
            $user_model->role_id = 3;
            $res = $user_model->add();
            if ($res) {
                $data['is_error'] = 0;
                $data['message'] = "User created successfully";
            }
        } else {
            $data['message'] = "This mobile number is already registered";
        }
    } else {
        $data['message'] = "This email id is already registered";
    }
    send_response($data);
}

function user_delete()
{
    global $user_model;
    $user_model->user_id = $_GET['delete_id'];
    $user_model->delete();
    $data = [
        'is_error' => 0,
        'message' => 'User deleted successfully'
    ];
    send_response($data);
}


function update_user()
{
    global $user_model, $db_handler;
    $data = [
        'is_error' => 1,
        'message' => 'error'
    ];
    if (!is_valid_mobile($_POST['mobile'])) {
        $data['message'] = "Invalid mobile number format";
        send_response($data);
    }
    if (!is_valid_email($_POST['email'])) {
        $data['message'] = "Invalid email id format";
        send_response($data);
    }

    $isExist = $db_handler->checkUnique('users', 'email', $_POST['email'], 'edit');
    if (!$isExist) {
        $isExist = $db_handler->checkUnique('users', 'mobile', $_POST['mobile'], 'edit');
        if (!$isExist) {

            $signature = upload_file('signature');
            $profile_pic = upload_file('profile_pic');

            $user_model->user_id = $_POST['user_id'];
            $user_model->name = $_POST['name'];
            $user_model->mobile = $_POST['mobile'];
            $user_model->email = $_POST['email'];
            $user_model->gender = $_POST['gender'];
            $user_model->address = $_POST['address'];
            $user_model->dob = $_POST['dob'];
            $user_model->profile_pic = $profile_pic;
            $user_model->signature =  $signature;
            $user_model->status =  $_POST['status'];
            $res = $user_model->update();
            if ($res) {
                $data['is_error'] = 0;
                $data['message'] = "User details updated successfully";
            }
        } else {
            $data['message'] = "This mobile number is already registered";
        }
    } else {
        $data['message'] = "This email id is already registered";
    }
    send_response($data);
}


function update_user_profile()
{
    global $user_model, $db_handler;
    $data = [
        'is_error' => 1,
        'message' => 'error'
    ];
    if (!is_valid_mobile($_POST['mobile'])) {
        $data['message'] = "Invalid mobile number format";
        send_response($data);
    }
    if (!is_valid_email($_POST['email'])) {
        $data['message'] = "Invalid email id format";
        send_response($data);
    }

    $isExist = $db_handler->checkUnique('users', 'email', $_POST['email'], 'edit');
    if (!$isExist) {
        $isExist = $db_handler->checkUnique('users', 'mobile', $_POST['mobile'], 'edit');
        if (!$isExist) {
            $signature = upload_file('signature');
            $profile_pic = upload_file('profile_pic');

            $user_model->user_id = $_SESSION['user']->user_id;
            $user_model->status = $_SESSION['user']->status;
            $user_model->name = $_POST['name'];
            $user_model->mobile = $_POST['mobile'];
            $user_model->email = $_POST['email'];
            $user_model->gender = $_POST['gender'];
            $user_model->address = $_POST['address'];
            $user_model->dob = $_POST['dob'];
            $user_model->profile_pic = $profile_pic;
            $user_model->signature =  $signature;
            $res = $user_model->update();
            if ($res) {
                $sql = 'SELECT t1.*,t2.role_name FROM users as t1 LEFT JOIN roles as t2 on t1.role_id=t2.role_id WHERE t1.user_id=:user_id';
                $params = [
                    'user_id' => $_SESSION['user']->user_id
                ];
                $user = $user_model->fetch($sql, $params);
                $_SESSION['user'] = $user;
                $data['is_error'] = 0;
                $data['message'] = "Profile updated successfully";
            }
        } else {
            $data['message'] = "This mobile number is already registered";
        }
    } else {
        $data['message'] = "This email id is already registered";
    }
    send_response($data);
}


function upload_file($file_control_name)
{
    if (!empty($_FILES[$file_control_name]['tmp_name'])) {
        $filename   = uniqid() . "-" . time();
        $extension  = pathinfo($_FILES[$file_control_name]["name"], PATHINFO_EXTENSION);
        $filename   = $filename . "." . $extension;
        $path = UPLOAD_PATH . $filename;
        move_uploaded_file($_FILES[$file_control_name]['tmp_name'], $path);
        return  $filename;
    } else {
        return 'default/no-image.jpg';
    }
}

function user_list()
{
    global $user_model;
    $data = [
        'is_error' => 0,
        'message' => 'success',
        'data' => $user_model->fetchAll()
    ];
    send_response($data);
}
