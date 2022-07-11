<?php
session_start();

include "db_conn.php";

if(isset($_POST['uname'])&& isset($_POST['user_id'])){ 
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
	$userid= validate($_POST['user_id']); 
    if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($userid)){
        header("Location: index.php?error=user_id is required");
	    exit();
    }else{
        $sql = "SELECT * FROM sigin WHERE user_name='$uname' AND user_id='$userid'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['user_id'] === $userid) {
                $_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: home.php");      
            }else{
				header("Location: index.php?error=Incorect User name or userid");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or userid");
	        exit();
		}
}
}else{
    header("Location :index.php");
    exit();
}