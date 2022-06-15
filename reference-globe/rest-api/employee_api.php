<?php
// include database and object files
include_once '../config.php';

function employee_list()
{
    global $emp_model;   
    $data = [
        'is_error' => 0,
        'message' => 'success',
        'data' => $emp_model->fetchAll()
    ];
    send_response($data);
}


