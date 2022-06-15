<?php
class UserModel
{
    private $db;
    public $name;
    public $mobiile;
    public $email;
    public $password;
    public $dob;
    public $address;
    public $profile_pic;
    public $signature;
    public $gender;
    public $role_id;

    function __construct($db_handler)
    {
        $this->db = $db_handler;
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
}
