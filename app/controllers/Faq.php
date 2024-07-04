<?php

class Faq extends Controller{
    public function __construct()
    {
        
    }
    public function index(){
        
        $this->view("faq");
    }
}