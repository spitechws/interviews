<?php
require_once(dirname(__FILE__, 2) . '/config.php');

if (isset($_POST['uname']) && isset($_POST['user_id'])) {

    $uname = validate($_POST['uname']);
    $userid = validate($_POST['user_id']);
    if (empty($uname)) {
        header("Location: ../index.php?error=User Name is required");
        exit();
    } else if (empty($userid)) {
        header("Location: ../index.php?error=user_id is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_name='$uname' AND user_id='$userid'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['aUser'] = (object)$row;
            header("Location: ../admin/home.php");
            exit();
        } else {
            header("Location: ../index.php?error=Incorect User name or userid");
            exit();
        }
    }
} else {
    header("Location:../index.php");
    exit();
}
