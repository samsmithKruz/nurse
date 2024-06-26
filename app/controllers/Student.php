<?php

class Student extends Controller
{
    private $model;
    private $modelAdmin;
    public function __construct()
    {
        Auth::isLoggedin(STUDENT);
        $this->model = $this->model("student_");
        $this->modelAdmin = $this->model("admin_");
    }
    public function index()
    {
        $data = array();
        $data['notices'] = $this->modelAdmin->getNotices();
        $data['current_class'] = $this->model->getClass();
        $data['average_score'] = $this->model->getAverageScore();
        $this->view("student/index", $data);
    }
    public function profile()
    {
        if(Auth::getMethod() == 'POST'){
            if(isset($_POST['q'])){
                $res = $this->model->updateProfile($_POST);
                $_SESSION[APP]->flashMessage = $res;
            }
            if(isset($_POST['q1'])){
                $res = $this->model->updatePassword($_POST);
                $_SESSION[APP]->flashMessage = $res;
            }
        }
        $data = $this->modelAdmin->getUser($_SESSION[APP]->email);
        $this->view("student/profile", $data);
    }
    public function test_submit()
    {
        if (Auth::getMethod() != 'POST' || !isset($_POST['id'])) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Test submission is invalid.",
            ));
            Helpers::back('admin');
        }
        $res = $this->modelAdmin->markTest($_POST);
        if ($res->state == 0) {
            $_SESSION[APP]->flashMessage = $res;
            Auth::redirect("student");
        }
        $data = $this->modelAdmin->getTestScore(Auth::safe_data($_POST['id']));
        $this->view("student/test_score", $data);
    }
    public function class()
    {
        if (!isset($_GET['t'])) {
            Helpers::back("student");
        }
        $data = array();
        $data['type'] = CLASSESS[Auth::safe_data($_GET['t'])];
        $r = $this->modelAdmin->getUser($_SESSION[APP]->email);
        if ($r->current_class != Auth::safe_data($_GET['t'])) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "You have not been enrolled in this class.",
            ));
            Helpers::back('admin');
        }
        $data['t'] = Auth::safe_data($_GET['t']);
        $data['timetable'] = $this->model->getTimeTable(Auth::safe_data($_GET['t']));
        $this->view("student/class", $data);
    }
    public function test()
    {
        if (!isset($_GET['id'])) {
            Auth::redirect("student/");
        }
        $data = array();
        $data['id'] = Auth::safe_data($_GET['id']);
        $data['test_details'] = $this->model->getTestDetails(Auth::safe_data($_GET['id']));
        $this->view("student/test_instruction", $data);
    }
    public function start_test()
    {
        if (!isset($_GET['id'])) {
            Auth::redirect("student/");
        }
        $test_details = $this->model->getTestDetails(Auth::safe_data($_GET['id']));
        $data = array();
        $data['id'] = Auth::safe_data($_GET['id']);
        $data['timer'] = $test_details->time;
        $test = $this->modelAdmin->loadUploadedTest(Auth::safe_data($_GET['id']));
        if (count($test) == 0) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Test not found.",
            ));
            Helpers::back('admin');
        }
        $data['tests'] = $test;
        $this->view("student/test_page", $data);
    }
    // public function watch_test(){
    //     if (!isset($_GET['id'])) {
    //         Auth::redirect("student/");
    //     }
    //     $data = array();
    //     $data['id'] = Auth::safe_data($_GET['id']);
    //     $data['timer'] = 0.25;
    //     print_r("View answered questions");
    //     $this->view("student/test_page",$data);
    // }
}
