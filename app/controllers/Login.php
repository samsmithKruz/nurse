<?php

class Login extends Controller{
    private $model;
    public function __construct()
    {
        $_SESSION[APP] = isset($_SESSION[APP]) ? $_SESSION[APP] : new stdClass;
        $this->model = $this->model("main_");
    }
    public function index(){
        
        $this->view("login");
    }
    public function validate(){
        if (Auth::getMethod() != 'POST') {
            Auth::redirect("signup");
        }
        $login = $this->model->login($_POST);
        if($login->state == 0){
            $_SESSION[APP]->flashMessage = $login;
            Auth::redirect("login");
        }
        if($_SESSION[APP]->enrollment_status == 0){
            $_SESSION[APP]->flashMessage = new stdClass;
            $_SESSION[APP]->flashMessage->state = 0;
            $_SESSION[APP]->flashMessage->message = "Program payment pending upon confirmation";
            Auth::redirect("signup/new_user?email=".$_SESSION[APP]->email);
        }
        if($_SESSION[APP]->is_admin == 1 || $_SESSION[APP]->is_admin == 2){
            Auth::redirect("admin");
        }
        Auth::redirect("student");
    }
}