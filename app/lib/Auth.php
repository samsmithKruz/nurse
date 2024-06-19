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
        $mail->SMTPDebug = 2;
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
            return true;
        } catch (PHPMailer\Exception $e) {
            //print_r($e->getMessage());
            return false;
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
    public static function reroute($url)
    {
        self::redirect(($url == 1 ? "admin/" : "user/"));
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
    public static function logout()
    {
        session_start();
        session_destroy();
        self::redirect('./signin');
    }
    public static function isLoggedin($type)
    {
        if (!isset($_SESSION[APP][$type])) {
            self::redirect("logout/");
        }
        return 'true';
    }
    public static function strongPassword($text = "", $len = 8)
    {
        return array("length" => !(strlen($text) < $len), "digit" => preg_match("/\d/", $text), "cap" => preg_match("/[A-Z]/", $text), "special" => preg_match("/[^\w\s]/", $text));
    }
    public static function createCode($l)
    {

        $min = pow(10, $l - 1);
        $max = pow(10, $l) - 1;

        do {
            $r = random_int($min, $max);
        } while (strlen($r) !== $l);

        return $r;
    }
}
