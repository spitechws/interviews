<?php
require_once 'BaseModel.php';

class EmployeeModel extends BaseModel
{
    private $db;
    private $tbl_name;

    public $emp_id;
    public $name;
    public $mobile;
    public $email;
    public $doj;
    public $dob;
    public $address;
    public $blood_group;
    public $designation;

    function __construct($db_handler)
    {
        $this->db = $db_handler;
        $this->tbl_name = 'employee';
    }

    public function add()
    {
        $sql = "INSERT INTO users(`name`,`mobile`,`email`,`address`,`designation`,`dob`,`doj`,`blood_group`)";
        $sql .= " VALUES(:name,:mobile,:email,:address,:designation,:dob,:doj,:blood_group,:signature,:role_id)";
        $params = [
            'email' => $this->email,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'designation' => $this->designation,
            'address' => $this->address,
            'blood_group' => $this->blood_group,
            'dob' => date('Y-m-d', strtotime($this->dob)),
            'doj' => date('Y-m-d', strtotime($this->doj))
        ];
        return $this->db->insert($sql, $params);
    }

    public function update()
    {
        $sql = 'UPDATE ' . $this->tbl_name . ' SET `name`=:name, `mobile`=:mobile, `email`=:email, `address`=:address, `gender`=:gender, 
        `dob`=:dob,`profile_pic`=:profile_pic,`signature`=:signature,`status`=:status  WHERE `emp_id`=:emp_id';
        $params = [
            'email' => $this->email,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'gender' => $this->gender,
            'profile_pic' => $this->profile_pic,
            'signature' => $this->signature,
            'dob' => date('Y-m-d', strtotime($this->dob)),
            'emp_id' => $this->emp_id,
            'status' => $this->status
        ];
        return $this->db->update($sql, $params);
    }

    public function delete()
    {
        $sql = "DELETE FROM $this->tbl_name WHERE emp_id=:emp_id";
        $params = ['emp_id' => $this->emp_id];
        return $this->db->delete($sql, $params);
    }

    public function fetch($sql, $params)
    {
        return $this->db->select($sql, $params);
    }

    public function fetchByPk()
    {
        $sql = "SELECT * FROM $this->tbl_name WHERE emp_id=:emp_id";
        $params = ['emp_id' => $this->emp_id];
        $data = $this->db->select($sql, $params);
        return !empty($data[0]) ? (object)$data[0] : null;
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM $this->tbl_name";
        $params = [];
        if (!empty($_GET['search_key'])) {
            $sql .= "and (`name` like :search_key or `mobile` like :search_key or email like :search_key)";
            $params['search_key'] = '%' . $_GET['search_key'] . '%';
        }
        return $this->db->select($sql, $params);
    }
}
