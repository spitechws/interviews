<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'api_handler.php';
set_error_handler("error_handler", E_ALL);


$action = $_GET['action'];
call_user_func($action);
