<?php

require_once 'config.php';

class DB
{

    private $conn;
    function __construct()
    {
        try {
            //$this->conn = new mysqli(HOST,USER,PASS,DATABASE);
            $this->conn = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insert($qry = '', $params = [])
    {
        $statement = $this->conn->prepare('INSERT INTO testtable (name, lastname, age)
        VALUES (:fname, :sname, :age)');
        $params = [
            'fname' => 'Bob',
            'sname' => 'Desaunois',
            'age' => '18',
        ];
        $statement->execute($params);
    }


    public function select($qry = '', $params = [])
    {
        // select a particular user by id
        $stmt = $this->conn->prepare($qry);
        $stmt->execute($params);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
