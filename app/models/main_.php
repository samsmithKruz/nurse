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
    public function getData($sql)
    {
        $this->db->query($sql);
        return $this->db->resultSet();
    }
    public function getTotalStudents()
    {
        $this->db->query("select count(email) as total from users where is_admin = 0");
        return $this->db->single()->total;
    }
    public function sendResetLink($post)
    {
        $email = Auth::safe_data($post['email']);
        if (strlen($email) == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Email cannot be empty",
            ));
        }
        if (!Auth::userExists($email)) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Email is not registered",
            ));
        }
        $code = bin2hex(random_bytes(5));
        $this->db->query("delete from reset_link where user_id=:email");
        $this->db->bind(":email", $email);
        $this->db->execute();

        $this->db->query("insert into reset_link(user_id,code,date) values(:email,:code,NOW())");
        $this->db->bind(":email", $email);
        $this->db->bind(":code", $code);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            $res = Helpers::send_forgot_email($email, $code);
            $res->message = $res->state == 1 ? "A reset link has been sent to your email." : "Unable to send reset link to email.";
            return $res;
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "Error: Please try again.",
        ));
    }
    public function validateToken($token)
    {
        $this->db->query("select user_id,date from reset_link where code=:code and status=0");
        $this->db->bind(":code", $token);
        return $this->db->single();
    }
    public function updatePassword($email,$post)
    {
        $email = @Auth::safe_data($email);
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


        $this->db->query('select email from users where email=:email');
        $this->db->bind(":email", $email);
        $this->db->execute();


        if ($this->db->rowCount() > 0) {
            $this->db->query('update users set password=:new where email=:email');
            $this->db->bind(":email", $email);
            $this->db->bind(":new", hash('md5', $new));
            $this->db->execute();
            $this->db->query('update reset_link set status=1 where user_id=:email');
            $this->db->bind(":email", $email);
            $this->db->execute();
            return Helpers::response(array(
                'state' => 1,
                'message' => "Updated successfully.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "User does not exist.",
        ));
    }
}
