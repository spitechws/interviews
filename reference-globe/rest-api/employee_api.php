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


function update_emp()
{
    global $emp_model, $db_handler;
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

    $isExist = $db_handler->checkUnique('employee', 'email', $_POST['email'], 'edit');
    if (!$isExist) {
        $isExist = $db_handler->checkUnique('employee', 'mobile', $_POST['mobile'], 'edit');
        if (!$isExist) {

            $emp_model->emp_id = $_POST['emp_id'];
            $emp_model->name = $_POST['name'];
            $emp_model->mobile = $_POST['mobile'];
            $emp_model->email = $_POST['email'];
            $emp_model->blood_group = $_POST['blood_group'];
            $emp_model->address = $_POST['address'];
            $emp_model->dob = $_POST['dob'];
            $emp_model->doj = $_POST['doj'];
            $emp_model->designation = $_POST['designation'];
            $res = $emp_model->update();
            if ($res) {
                $data['is_error'] = 0;
                $data['message'] = "Employee details updated successfully";
            }
        } else {
            $data['message'] = "This mobile number is already registered";
        }
    } else {
        $data['message'] = "This email id is already registered";
    }
    send_response($data);
}


function add_emp()
{
    global $emp_model, $db_handler;
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

    $isExist = $db_handler->checkUnique('employee', 'email', $_POST['email']);
    if (!$isExist) {
        $isExist = $db_handler->checkUnique('employee', 'mobile', $_POST['mobile']);
        if (!$isExist) {
            $emp_model->name = $_POST['name'];
            $emp_model->mobile = $_POST['mobile'];
            $emp_model->email = $_POST['email'];
            $emp_model->blood_group = $_POST['blood_group'];
            $emp_model->address = $_POST['address'];
            $emp_model->dob = $_POST['dob'];
            $emp_model->doj = $_POST['doj'];
            $emp_model->designation = $_POST['designation'];
            $res = $emp_model->add();
            if ($res) {
                $data['is_error'] = 0;
                $data['message'] = "Employee created successfully";
            }
        } else {
            $data['message'] = "This mobile number is already registered";
        }
    } else {
        $data['message'] = "This email id is already registered";
    }
    send_response($data);
}


function emp_delete()
{
    global $emp_model;
    $emp_model->emp_id = $_GET['delete_id'];
    $emp_model->delete();
    $data = [
        'is_error' => 0,
        'message' => 'Employee deleted successfully'
    ];
    send_response($data);
}
