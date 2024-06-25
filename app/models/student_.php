<?php

class student_ extends Database
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getUser($email){
        $this->db->query("select *, null as password from users where email=:email");
        $this->db->bind(":email",$email);
        return $this->db->single();
    }
    public function countEnrolled($f = ""){
        $this->db->query("select count(email) as total from users where enrollment_status = ".($f == ""?"1":"0"));
        return $this->db->single()->total;
    }
}
