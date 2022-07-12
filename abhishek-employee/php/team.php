<?php
require_once(dirname(__FILE__, 2) . '/config.php');

$response = ['message' => '', 'is_error' => 0];
if (isset($_POST['emp'])) {
    $aEmp = $_POST['emp'];
    $project_id = $_POST['project_id'];
    if (!empty($aEmp) && is_array($aEmp)) {
        foreach ($aEmp as $emp) {
            $sql = "INSERT INTO team (`emp_id`,`project_id`) VALUES('" . $emp . "','" . $project_id . "')";
            mysqli_query($conn, $sql);
        }
        $response['message'] = 'Team created successully';
    }
} else {
    $response['is_error'] = 1;
    $response['message'] = 'Please select emp';
}
echo json_encode($response);
