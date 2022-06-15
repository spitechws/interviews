<?php
require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    private $db;
    public $user_id;
    public $name;
    public $mobile;
    public $email;
    public $password;
    public $dob;
    public $address;
    public $profile_pic;
    public $signature;
    public $gender;
    public $role_id;
    public $status;

    function __construct($db_handler)
    {
        $this->db = $db_handler;
    }

    public function setUser($object)
    {
        if (is_array($object)) {
            $object = (object)$object;
        }
        $this->user_id = $object->user_id;
        $this->name = $object->name;
        $this->mobile = $object->mobile;
        $this->email = $object->email;
        $this->dob = $object->dob;
        $this->address = $object->address;
        $this->profile_pic = $object->profile_pic;
        $this->signature = $object->signature;
        $this->gender = $object->gender;
        $this->role_id = $object->role_id;
        $this->status = $object->status;
        return $this;
    }

    public function getStatus()
    {
        return ($this->status == 1) ? "Active" : "Inactive";
    }

    public function add()
    {
        $sql = "INSERT INTO users(`name`,`mobile`,`email`,`address`,`gender`,`dob`,`password`,`profile_pic`,`signature`,`role_id`)";
        $sql .= " VALUES(:name,:mobile,:email,:address,:gender,:dob,:password,:profile_pic,:signature,:role_id)";
        $params = [
            'password' => md5($this->password),
            'email' => $this->email,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'gender' => $this->gender,
            'profile_pic' => $this->profile_pic,
            'signature' => $this->signature,
            'dob' => date('Y-m-d', strtotime($this->dob)),
            'role_id' => !empty($this->role_id) ? $this->role_id : 1
        ];
        return $this->db->insert($sql, $params);
    }

    public function update()
    {
        $sql = 'UPDATE users SET `name`=:name, `mobile`=:mobile, `email`=:email, `address`=:address, `gender`=:gender, 
        `dob`=:dob,`profile_pic`=:profile_pic,`signature`=:signature  WHERE `user_id`=:user_id';
        $params = [
            'email' => $this->email,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'gender' => $this->gender,
            'profile_pic' => $this->profile_pic,
            'signature' => $this->signature,
            'dob' => date('Y-m-d', strtotime($this->dob)),
            'user_id' => $this->user_id
        ];
        return $this->db->update($sql, $params);
    }

    public function delete()
    {
        $sql = "DELETE FROM users WHERE user_id=:user_id";
        $params = ['user_id' => $this->user_id];
        return $this->db->delete($sql, $params);
    }

    public function fetch($sql, $params)
    {
        return $this->db->select($sql, $params);
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM users where 1 ";
        $params = [];
        if (!empty($_GET['search'])) {
            if (!empty($_GET['search_key'])) {
                $sql .= "and `name` like :name ";
                $params['name'] = '%'.$_GET['search_key'].'%';
            }
        }
        return $this->db->select($sql, $params);
    }
}
