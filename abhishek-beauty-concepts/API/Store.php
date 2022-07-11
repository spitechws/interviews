<?php
class Store{
  
    // database connection and table name
    private $conn;
    private $table_name = "store";
  
    // object properties
    public $id;
    public $store_id;
    public $city_id; 
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read($store_id){    
        // select all query
        $query = "SELECT t2.id as city_id,t2.city_name from $this->table_name as t1 left join master_city as t2 on t1.city_id=t2.id where t1.store_id=$store_id";    
        // prepare query statement
        $stmt = $this->conn->prepare($query);    
        // execute query
        $stmt->execute();    
        return $stmt;
    }
}
?>