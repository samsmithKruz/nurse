<?php

class student_ extends Database
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function testTaken($id)
    {
        $this->db->query("select id from test_score where test_id=:id and user_id=:email");
        $this->db->bind(":id", $id);
        $this->db->bind(":email", $_SESSION[APP]->email);
        $this->db->execute();
        return $this->db->rowCount() > 0 ? true : false;
    }
    public function getUser($email)
    {
        $this->db->query("select *, null as password from users where email=:email");
        $this->db->bind(":email", $email);
        return $this->db->single();
    }
    public function countEnrolled($f = "")
    {
        $this->db->query("select count(email) as total from users where enrollment_status = " . ($f == "" ? "1" : "0"));
        return $this->db->single()->total;
    }
    public function getClass()
    {
        $id = Auth::safe_data($_SESSION[APP]->email);
        $this->db->query("select current_class from users where email =:email ");
        $this->db->bind(":email", $id);
        return $this->db->single()->current_class;
    }
    public function getTimeTable($class)
    {
        $this->db->query("
        select 
            file_uploads.source 
        from add_timetable 
        left join file_uploads on
            file_uploads.id = add_timetable.file_id
        where section_type=:class
        ");
        $this->db->bind(":class", $class);
        return $this->db->single()->source ?? "";
    }
    public function getTestDetails($id)
    {
        $this->db->query("SELECT * FROM new_test where id=:id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }
    public function getAverageScore($current_class = "", $id = "")
    {
        $id = $id == "" ? $_SESSION[APP]->email : $id;
        $this->db->query("select current_class from users where email=:email");
        $this->db->bind(":email", $id);
        $current_class = $this->db->single()->current_class;
        
        
        $this->db->query("
        select 
            avg(test_score.score) as average 
        from test_score
        join add_test on 
            add_test.test_id = test_score.test_id
        where 
            test_score.user_id=:id and
            add_test.class = '$current_class'
            ");
        $this->db->bind(":id", $id);
        return $this->db->single()->average;
    }
    public function updateProfile($post)
    {
        $fullname = @Auth::safe_data($post['fullname']) ?? "";
        $whatsapp = @Auth::safe_data($post['whatsapp']) ?? "";
        $gender = @Auth::safe_data($post['gender']) ?? "";

        if (strlen($fullname) == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Full name cannot be empty.",
            ));
        }
        if (strlen($gender) > 0) {
            $gender = ", gender='$gender'";
        }
        if (strlen($whatsapp) > 0) {
            $whatsapp = ", whatsapp='$whatsapp'";
        }
        $sql = "
            UPDATE users set
                fullname='$fullname' $gender $whatsapp
            where email=:email
        ";
        $this->db->query($sql);
        $this->db->bind(":email", $_SESSION[APP]->email);
        $this->db->execute();


        if ($this->db->rowCount() > 0) {
            Auth::setSession($_SESSION[APP]->email);
            return Helpers::response(array(
                'state' => 1,
                'message' => "Updated successfully.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "No changes made.",
        ));
    }
    public function updatePassword($post)
    {
        $current = @Auth::safe_data($post['current']);
        $new = @Auth::safe_data($post['new']);
        $confirm = @Auth::safe_data($post['confirm']);

        if (strlen($new) == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Password cannot be empty.",
            ));
        }
        if ($new !== $confirm) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Password do not match.",
            ));
        }

        $this->db->query('select email from users where email=:email and password=:password');
        $this->db->bind(":email", $_SESSION[APP]->email);
        $this->db->bind(":password", hash('md5', $current));
        $this->db->execute();


        if ($this->db->rowCount() > 0) {
            $this->db->query('update users set password=:new where email=:email and password=:password');
            $this->db->bind(":email", $_SESSION[APP]->email);
            $this->db->bind(":password", hash('md5', $current));
            $this->db->bind(":new", hash('md5', $new));
            $this->db->execute();
            return Helpers::response(array(
                'state' => 1,
                'message' => "Updated successfully.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "Incorrect password.",
        ));
    }
}
