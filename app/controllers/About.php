<?php

class About extends Controller{
    public function __construct()
    {
        
    }
    public function index(){
        
        $this->view("about");
    }
}