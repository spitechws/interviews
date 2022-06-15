<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config.php';

function get_users()
{
    global $user_model;
    $data = $user_model->fetchAll();
    send_response($data);
}

function error_handler($error_no, $error){
    $data=[
        'error_no'=>$error_no,
        'error'=>$error,
    ];
    send_response($data,500,'error');
}


function send_response($data, $status = 200, $message = 'success')
{
    $response = [
        'status' => $status,
        'message' => $message
    ];
    if (!empty($data)) {
        $response['data'] = $data;
    }
    http_response_code($status);
    echo json_encode($response);
}