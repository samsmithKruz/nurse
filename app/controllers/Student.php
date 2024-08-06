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
        $data['average_score'] = $this->model->getAverageScore($data['current_class']);
        $this->view("student/index", $data);
    }
    public function profile()
    {
        if (Auth::getMethod() == 'POST') {
            if (isset($_POST['q'])) {
                $res = $this->model->updateProfile($_POST);
                $_SESSION[APP]->flashMessage = $res;
            }
            if (isset($_POST['q1'])) {
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
            Helpers::back('student');
        }
        $test_id = $_POST['id'];
        unset($_POST['id']);
        $questions = $_POST;
        $_SESSION[APP]->flashMessage = $this->modelAdmin->submitTest($test_id, $questions);
        if ($_SESSION[APP]->flashMessage->state == 0) {
            Auth::redirect("student");
        }
        Auth::redirect("student/test_score?id=" . $test_id);
    }
    public function test_score()
    {
        if (!isset($_GET['id'])) {
            Auth::redirect("student/");
        }
        $data = [];
        $score = $this->modelAdmin->getTestScore(Auth::safe_data($_GET['id']));
        if (!$score) {
            $_SESSION[APP]->flashMessage = (object)[
                'state' => 0,
                'message' => 'Test score was not found.'
            ];
            Auth::redirect("student/");
        }
        $data['score'] = $score;
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
            Helpers::back("student");
        }
        if ($this->model->testTaken(Auth::safe_data($_GET['id']))) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => 'You have already submitted this test.'
            ));
            Helpers::back("student");
        }

        $test_details = $this->model->getTestDetails(Auth::safe_data($_GET['id']));
        $data = array();
        $data['id'] = Auth::safe_data($_GET['id']);
        $data['timer'] = $test_details->time;
        $data['test_name'] = $test_details->name;
        $test = $this->modelAdmin->loadUploadedTest(Auth::safe_data($_GET['id']));
        if (count($test) == 0) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Test not found.",
            ));
            Helpers::back('student');
        }
        $data['tests'] = $test;
        $this->view("student/test_page", $data);
    }
    public function watch_test()
    {
        if (!isset($_GET['id'])) {
            Auth::redirect("student/");
        }
        if (!$this->model->testTaken(Auth::safe_data($_GET['id']))) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => 'You have not submitted this test.'
            ));
            Helpers::back("student");
        }
        $test_details = $this->model->getTestDetails(Auth::safe_data($_GET['id']));
        $data = [];
        $data['id'] = Auth::safe_data($_GET['id']);
        $data['timer'] = $test_details->time;
        $data['test_name'] = $test_details->name;
        $test = $this->modelAdmin->loadUploadedTest(Auth::safe_data($_GET['id']));
        $test_submit = $this->modelAdmin->getSubmitted(Auth::safe_data($_GET['id']));
        if (count($test) == 0 || !$test_submit) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Unable to fetch test details.",
            ));
            Helpers::back('student');
        }
        $data['tests'] = $test;
        $data['test_submit'] = $test_submit;
        // print_r($test);exit();
        $this->view("student/test_view", $data);
    }
}
