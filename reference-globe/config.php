<?php
session_start();
error_reporting(E_ALL);

define('APP_PATH', 'D:\wamp64\www\spsoni\interviews\reference-globe' . DIRECTORY_SEPARATOR);
define('BASE_URL', 'http://localhost/spsoni/interviews/reference-globe/');

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DATABASE', 'reference_globe');

require_once APP_PATH . 'php/DB.php';

$db_handler = new DB();

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
