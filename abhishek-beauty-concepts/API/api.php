<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// include database and object files
include_once 'Database.php';
include_once 'Store.php';
  
// instantiate database and store object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$store = new Store($db);

// query stores
$stmt = $store->read($_GET['store_id']);
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
  
    // stores array
    $stores_arr=array();
    $stores_arr["cityList"]=array();  
   
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){             
        $store_item=array(         
            "city_name" => $row['city_name'],
            "city_id" => $row['city_id']
        );
  
        array_push($stores_arr["cityList"], $store_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show stores data in json format
    echo json_encode($stores_arr);
}