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

    public function select($qry = '', $params = [], $is_debug = 0)
    {
        // select a particular user by id
        $stmt = $this->conn->prepare($qry);
        if (!empty($params)) {
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }
        if ($is_debug) {
            debug($params, 0);
            debug($stmt, 0);
        }
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($qry = '', $params = [], $is_debug = 0)
    {
        $stmt = $this->conn->prepare($qry);
        if (!empty($params)) {
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }
        if ($is_debug) {
            debug($params, 0);
            debug($stmt, 1);
        }
    }

    public function update($qry = '', $params = [], $is_debug = 0)
    {
        $stmt = $this->conn->prepare($qry);
        if ($is_debug) {
            debug($params, 0);
            debug($stmt, 1);
        }
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

    public function checkUnique($table_name, $field_name, $field_value, $action = 'add')
    {
        $response = FALSE;
        $sql = "SELECT * FROM $table_name where $field_name=:field_value";
        $params = [
            "field_value" => $field_value
        ];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if ($action == 'add') {
            if (!empty($data) && count($data) > 0) {
                $response = TRUE;
            }
        } else {
            //debug("count:".count($data));
            if (!empty($data) && count($data) > 1) {
                $response = TRUE;
            }
        }
        return $response;
    }
}
