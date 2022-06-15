<?php
session_start();
error_reporting(E_ALL);

define('APP_PATH', 'D:\wamp64\www\spsoni\interviews\reference-globe' . DIRECTORY_SEPARATOR);
define('BASE_URL', 'http://localhost/spsoni/interviews/reference-globe/');

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DATABASE', 'reference_globe');

function show_alert()
{
    if (!empty($_GET['msg'])) { ?>
        <div class="alert alert-primary"><?php echo $_GET['msg']; ?></div>
<?php
    }
}

function set_selected($left, $right)
{
    if ($left == $right) {
        echo "selected";
    }
}

function invalid_action()
{
    echo "Invalid Activity";
    exit;
}


require_once APP_PATH . 'php/DB.php';
require_once APP_PATH . 'php/models/UserModel.php';
require_once APP_PATH . 'php/models/EmployeeModel.php';

$db_handler = new DB();
$user_model = new UserModel($db_handler);
$emp_model = new EmployeeModel($db_handler);