<?php
include_once 'api-functions.php';
set_error_handler("error_handler", E_ALL);


$action = $_GET['action'];
call_user_func($action);


