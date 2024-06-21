<?php

class Logout extends Controller{
    public function __construct()
    {
        
    }
    public function index(){
        Auth::logout();
        Auth::redirect("login");
    }
}