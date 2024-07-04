<?php

class Signup extends Controller
{
    private $model;
    public function __construct()
    {
        $_SESSION[APP] = isset($_SESSION[APP]) ? $_SESSION[APP] : new stdClass;
        $this->model = $this->model("main_");
    }
    public function index()
    {

        $this->view("signup");
    }
    public function register()
    {
        if (Auth::getMethod() != 'POST') {
            Auth::redirect("signup");
        }
        $register = $this->model->register($_POST);
        $_SESSION[APP]->flashMessage = $register;
        if ($register->state == 0) {
            Auth::redirect("signup");
        }
        Auth::redirect("signup/new_user?email=" . $_POST['email']);
        // $this->view("signup");
    }
    public function new_user()
    {
        if (!isset($_GET['email'])) {
            Auth::redirect("login");
        }
        $res = Helpers::send_register_email($_GET['email']);
        if($res->state == 0){
            $_SESSION[APP]->flashMessage = $res;
        }
        $this->view("new_user");
    }
}
