<?php
$sname= "localhost";
$unmae= "root";
$user_id = "";
$db_name = "employee";
$conn = mysqli_connect($sname, $unmae, $user_id, $db_name);
if (!$conn) {
	echo "Connection failed!";
}
?>