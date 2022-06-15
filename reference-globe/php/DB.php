<?php
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
        if (!empty($params)) {
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($qry = '', $params = [])
    {       
        $stmt = $this->conn->prepare($qry);
        if (!empty($params)) {
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }
    }

    public function update($qry = '', $params = [])
    {
        // echo $qry;
        // debug($params);
        $stmt = $this->conn->prepare($qry);
        return $stmt->execute($params);
    }

    public function hasAccess($action, $module = 'users')
    {
        if ($_SESSION['user']->role_id == 1) { // superadmin
            return true;
        } else {  // Admin or Users
            $qry = "select * from user_access where role_id=:role_id and action=:action and module=:module";
            $params = [
                "role_id" => $_SESSION['user']->role_id,
                "action" => $action,
                "module" => $module
            ];
            $stmt = $this->conn->prepare($qry);
            if (!empty($params)) {
                $stmt->execute($params);
            } else {
                $stmt->execute();
            }
            $access = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!empty($access['id'])) {
                return true;
            } else {
                return false;
            }
        }
    }
}
