<?php

class Contact extends Controller{
    private $model;
    public function __construct()
    {
        $_SESSION[APP] = isset($_SESSION[APP]) ? $_SESSION[APP] : new stdClass;
        $this->model = $this->model("main_");
    }
    public function index(){
        if(Auth::getMethod() == 'POST'){
            $res = $this->model->sendContactForm($_POST);
            $_SESSION[APP]->flashMessage = $res;
        }
        $this->view("contact");
    }
}