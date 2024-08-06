<?php

use PHPMailer\PHPMailer;
use PHPMailer\Exception;
use PHPMailer\SMTP;

class Auth extends Database
{

    public static function sendMail($reciever, $subject, $message)
    {
        require_once('PHPMailer/PHPMailer.php');
        require_once('PHPMailer/Exception.php');
        require_once('PHPMailer/SMTP.php');
        $mail = new PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        // $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.hostinger.com';

        $mail->SMTPAuth = true;
        $mail->Username = MAIL_USER;
        $mail->Password = MAIL_PASSWORD;

        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom(INFO_MAIL, INFO_MAIL);
        $mail->addAddress("$reciever");
        $mail->isHTML(true);
        $mail->Subject = "$subject";
        $mail->Body = "$message";

        try {
            $mail->send();
            return Helpers::response(array(
                'state' => 1,
                'message' => 'Email sent'
            ));
        } catch (PHPMailer\Exception $e) {
            return Helpers::response(array(
                'state' => 0,
                'message' => $e->getMessage()
            ));
        }
    }
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    public static function changePassword($data)
    {
        $db = new Database;
        $password_old = Auth::safe_data($data['old']);
        $id = @Auth::safe_data($data['id']) ?? "";
        $password_new = Auth::safe_data($data['new']);

        $db->query("select id from user where id=:id and password_ =:password");
        $db->bind(":id", @$_SESSION[APP]->account->id ?? $id);
        $db->bind(":password", $password_old);
        $db->execute();
        if ($db->single()) {
            $db->query("update user set password_=:password where id=:id");
            $db->bind(":id", @$_SESSION[APP]->account->id ?? $id);
            $db->bind(":password", $password_new);
            $db->execute();
            return "true";
        } else {
            return 'Password is incorrect';
        }
    }
    public static function safe_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return isset($data) ? $data : "";
    }
    public static function redirect($url)
    {
        header("location:" . URLROOT . "/$url");
        exit();
    }
    public static function userExists($email)
    {
        $db = new Database;
        $db->query('SELECT * FROM users WHERE LOWER(email)=:email;');
        $db->bind(':email', strtolower(Auth::safe_data($email)));
        $db->execute();
        return $db->rowCount() > 0 ? true : false;
    }
    public static function logout()
    {
        session_start();
        session_destroy();
        self::redirect('login');
    }
    public static function isLoggedin($type)
    {
        if (!isset($_SESSION[APP]->is_admin) || $_SESSION[APP]->is_admin != $type) {
            self::redirect("logout/");
        }
        return true;
    }
    public static function strongPassword($text = "", $len = 8)
    {
        return array("length" => !(strlen($text) < $len), "digit" => preg_match("/\d/", $text), "cap" => preg_match("/[A-Z]/", $text), "special" => preg_match("/[^\w\s]/", $text));
    }
    public static function setSession($email)
    {
        $db = new Database;
        $db->query('SELECT *, null as password FROM users WHERE email=:email ');
        $db->bind(':email', $email);
        $_SESSION[APP] = $db->single();
        return true;
    }
    public static function viewAccess($user)
    {
        return $_SESSION[APP]->is_admin == $user;
    }
    public static function pageAccess($user)
    {
        if ($_SESSION[APP]->is_admin != $user) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                "state"=>0,
                "message"=>"The requested page is restricted"
            ));
            Helpers::back($user == 0 ? 'student' : 'admin');
        }
    }
}
