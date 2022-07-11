<?php
session_start();

define("BASE_URL", 'http://localhost:8383/spsoni/interviews/abhishek-employee/');
define("BASE_PATH", dirname(__FILE__, 1) . '/');
define("ASSETS", BASE_URL . 'assets/');


define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PASS", '');
define("DB_NAME", 'interviews_abhishek_emp');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    echo "Connection failed!";
}

require_once BASE_PATH . 'php/helpers.php';
