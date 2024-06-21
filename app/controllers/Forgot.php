<?php

class Forgot extends Controller{
    public function __construct()
    {
        
    }
    public function index(){
        
        $this->view("forgot");
    }
}