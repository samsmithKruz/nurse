<?php

namespace php\lib;

class Auth
{
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
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
        header("location:" . APP_DIR . "/$url");
        exit();
    }
    public static function strongPassword($text = "", $len = 8)
    {
        return array("length" => !(strlen($text) < $len), "digit" => preg_match("/\d/", $text), "cap" => preg_match("/[A-Z]/", $text), "special" => preg_match("/[^\w\s]/", $text));
    }
    public static function resetSession($data)
    {
        $_SESSION[APP] = $data;
    }
    public static function access($role = ROLE_USER)
    {
        // Edit this line later for access to work as intended
        return true || $_SESSION[APP]->role == $role;
    }
    public static function pageAccess($role = ROLE_USER)
    {
        return $_SESSION[APP]->role != $role ? self::redirect("dashboard/") : "";
    }
    public static function isLoggedin()
    {
        @$_SESSION[APP]->role == null ? self::redirect("login.php") : "";
    }
}
