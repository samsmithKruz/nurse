<?php

class main_ extends Database
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function register($data)
    {
        extract((array)$data);
        $fullname = Auth::safe_data($fullname);
        $email = Auth::safe_data($email);
        $whatsapp = Auth::safe_data($whatsapp);
        $password = hash('md5', Auth::safe_data($password));

        if (empty($fullname)) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Fullname cannot be empty",
            ));
        }
        if (empty($email)) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Email cannot be empty",
            ));
        }
        if (empty($whatsapp)) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Whatsapp number cannot be empty",
            ));
        }
        if (empty($password)) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Invalid password cannot be empty",
            ));
        }

        if (Auth::userExists($email)) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Student already enrolled, proceed to login",
            ));
        }
        $this->db->query("INSERT INTO users(email,password,fullname,whatsapp) values(:email,:password,:fullname,:whatsapp)");
        $this->db->bind(":email", $email);
        $this->db->bind(":password", $password);
        $this->db->bind(":fullname", $fullname);
        $this->db->bind(":whatsapp", $whatsapp);
        $this->db->execute();

        Auth::setSession($email);
        return Helpers::response(array(
            'state' => 1,
            'message' => "Registration successful",
        ));
    }
    public function login($data)
    {
        extract((array)$data);
        $email = Auth::safe_data($email);
        $password = hash('md5', Auth::safe_data($password));

        if (empty($email)) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Email cannot be empty",
            ));
        }
        if (empty($password)) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Invalid password cannot be empty",
            ));
        }

        if (!Auth::userExists($email)) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Email does not exist kindly register for this session.",
            ));
        }
        $this->db->query("select email from users where email=:email and password=:password");
        $this->db->bind(":email", $email);
        $this->db->bind(":password", $password);
        $user = $this->db->single();
        if ($this->db->rowCount() == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Email and password is incorrect.",
            ));
        }

        Auth::setSession($email);
        return Helpers::response(array(
            'state' => 1,
            'message' => "Successful",
        ));
    }
    public function getData($sql){
        $this->db->query($sql);
        return $this->db->resultSet();
    }
    public function getTotalStudents(){
        $this->db->query("select count(email) as total from users where is_admin = 0");
        return $this->db->single()->total;
    }
}
