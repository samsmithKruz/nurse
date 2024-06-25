<?php

class Student extends Controller{
    private $model;
    public function __construct()
    {
        // Auth::isLogged(STUDENT);
        // $this->model = $this->model("student_");
    }
    public function index(){
        
        $this->view("student/index");
    }
    public function profile(){
        
        $this->view("student/profile");
    }
    public function test_submit(){
        $this->view("student/test_score");
    }
    public function class(){
        if (!isset($_GET['t'])) {
            Auth::redirect("student/");
        }
        $data = array();
        switch (Auth::safe_data($_GET['t'])) {
            case "a":
                $data['type'] = "a";
                break;
            case "b":
                $data['type'] = "b";
                break;
            default:
                $data['type'] = "c";
                break;
        }
        $this->view("student/class",$data);
    }
    public function test(){
        if (!isset($_GET['id'])) {
            Auth::redirect("student/");
        }
        $data = array();
        $data['id'] = Auth::safe_data($_GET['id']);
        $this->view("student/test_instruction",$data);
    }
    public function start_test(){
        if (!isset($_GET['id'])) {
            Auth::redirect("student/");
        }
        $data = array();
        $data['id'] = Auth::safe_data($_GET['id']);
        $data['timer'] = 0.25;
        $this->view("student/test_page",$data);
    }
}