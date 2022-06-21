<?php
session_start();
error_reporting(E_ALL);

define('APP_PATH', "D:/wamp64/www/spsoni/interviews/reference-globe/");
define('BASE_URL', 'http://localhost:8383/spsoni/interviews/reference-globe/');


define('UPLOAD_PATH', APP_PATH . 'uploads/');
define('UPLOAD_URL', BASE_URL . 'uploads/');

define('API_BASE_URL', BASE_URL . 'rest-api/api.php');

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DATABASE', 'reference_globe');

require_once APP_PATH . 'php/helpers.php';
require_once APP_PATH . 'php/DB.php';
require_once APP_PATH . 'php/models/UserModel.php';
require_once APP_PATH . 'php/models/EmployeeModel.php';

$db_handler = new DB();
$user_model = new UserModel($db_handler);
$emp_model = new EmployeeModel($db_handler);
