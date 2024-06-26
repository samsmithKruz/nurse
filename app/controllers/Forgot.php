<?php

class Forgot extends Controller{
    private $model;
    public function __construct()
    {
        $_SESSION[APP] = isset($_SESSION[APP]) ? $_SESSION[APP] : new stdClass;
        $this->model = $this->model("main_");
    }
    public function index(){
        
        $this->view("forgot");
    }
    public function reset(){
        if(Auth::getMethod() == 'POST'){
            $this->model->sendResetLink();
        }
        Auth::redirect("forgot");
    }
}