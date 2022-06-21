<?php
require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    private $db;
    private $tbl_name;

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
        $this->tbl_name = 'users';
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
            'role_id' => !empty($this->role_id) ? $this->role_id : 3
        ];
        return $this->db->insert($sql, $params);
    }

    public function update()
    {
        $sql = 'UPDATE ' . $this->tbl_name . ' SET `name`=:name, `mobile`=:mobile, `email`=:email, `address`=:address, `gender`=:gender, 
        `dob`=:dob,`profile_pic`=:profile_pic,`signature`=:signature,`status`=:status  WHERE `user_id`=:user_id';
        $params = [
            'email' => $this->email,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'gender' => $this->gender,
            'profile_pic' => $this->profile_pic,
            'signature' => $this->signature,
            'dob' => date('Y-m-d', strtotime($this->dob)),
            'user_id' => $this->user_id,
            'status' => $this->status
        ];

        //----removing old files
        $user = $this->fetchByPk();
        $signature = UPLOAD_PATH . $user->signature;
        if (file_exists($signature)) {
            unlink($signature);
        }
        $profile_pic = UPLOAD_PATH . $user->profile_pic;
        if (file_exists($profile_pic)) {
            unlink($profile_pic);
        }
        return $this->db->update($sql, $params);
    }

    public function delete()
    {
        $sql = "DELETE FROM $this->tbl_name WHERE user_id=:user_id";
        $params = ['user_id' => $this->user_id];
        return $this->db->delete($sql, $params);
    }

    public function fetch($sql, $params)
    {
        return $this->db->select($sql, $params);
    }

    public function fetchByPk()
    {
        $sql = "SELECT * FROM $this->tbl_name WHERE user_id=:user_id";
        $params = ['user_id' => $this->user_id];
        $data = $this->db->select($sql, $params);
        return !empty($data[0]) ? (object)$data[0] : null;
    }

    public function fetchAll()
    {
        $sql = "SELECT t1.*,t2.role_name FROM $this->tbl_name as t1 LEFT JOIN roles as t2 on t1.role_id=t2.role_id where 1 ";
        $params = [];
        if (!empty($_GET['search_key'])) {
            $sql .= "and (`name` like :search_key or `mobile` like :search_key or email like :search_key)";
            $params['search_key'] = '%' . $_GET['search_key'] . '%';
        }
        return $this->db->select($sql, $params);
    }
}
