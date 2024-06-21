<?php

class Signup extends Controller{
    public function __construct()
    {
        
    }
    public function index(){
        
        $this->view("signup");
    }
}