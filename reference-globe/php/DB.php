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
        $stmt = $this->conn->prepare($qry);
        return $stmt->execute($params);
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

    public function checkUnique($table_name, $field_name, $field_value)
    {
        $sql = "SELECT * FROM $table_name where $field_name=:field_value";
        $params = [
            "field_value" => $field_value
        ];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
