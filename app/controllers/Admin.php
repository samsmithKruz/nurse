<?php

class Admin extends Controller
{
    private $model;
    public function __construct()
    {
        Auth::isLoggedin(ADMIN);
        $this->model = $this->model("admin_");
    }
    public function index()
    {
        if (Auth::getMethod() == 'POST') {
            if (!isset($_POST['file'])) {
                $res = Helpers::response(array(
                    'state' => 0,
                    'message' => "File not selected.",
                ));
            } else {
                if (isset($_POST['q1'])) {
                    $res = $this->model->add_file($_POST['file'], 'general_library');
                }
                if (isset($_POST['q2'])) {
                    $res = $this->model->add_link($_POST);
                }
            }

            $_SESSION[APP]->flashMessage = $res;
        }
        $data = [];
        $data['enrolled'] = $this->model->countEnrolled() - 1;
        $data['unregistered'] = $this->model->countEnrolled(1);
        $data['files'] = $this->model->getFileNames();
        // $user = $this->model->getUser($_SESSION[APP]->email);
        // print_r($user);exit();
        // $data['fullname'] = $user->fullname;

        $this->view("admin/index", $data);
    }
    public function fileRemove()
    {
        if (!isset($_GET['type']) || !isset($_GET['section']) || !isset($_GET['id'])) {
            $_SESSION[APP]->flashMessage =  Helpers::response(array(
                'state' => 0,
                'message' => "Error: Invalid parameters",
            ));
            Auth::redirect("admin");
        }
        $_SESSION[APP]->flashMessage = $this->model->remove_file($_GET);

        Helpers::back('admin');
    }
    public function student_delete()
    {
        if (!isset($_GET['id'])) {
            $_SESSION[APP]->flashMessage =  Helpers::response(array(
                'state' => 0,
                'message' => "User cannot be empty",
            ));
            Auth::redirect("admin");
        }
        $_SESSION[APP]->flashMessage = $this->model->remove_student(Auth::safe_data($_GET));

        Helpers::back('admin');
    }
    public function upload()
    {
        if (Auth::getMethod() == 'POST' && isset($_POST['q'])) {
            $_SESSION[APP]->flashMessage = $this->model->uploadFile($_POST['filename'], $_FILES['file1']);
        }

        $this->view("admin/fileupload");
    }
    public function deleteUploads()
    {
        if (isset($_GET['id'])) {
            $res = $this->model->deleteUpload(Auth::safe_data($_GET['id']));
            $_SESSION[APP]->flashMessage = $res;
        }
        Auth::redirect("admin/upload");
    }
    public function test_maker()
    {

        $this->view("admin/test_maker");
    }
    public function new_test()
    {
        if (Auth::getMethod() == 'POST') {
            $_SESSION[APP]->flashMessage =  $this->model->new_test($_POST, $this->model->sanitize_questions($_POST));
        }
        $this->view("admin/new_test");
    }
    public function profile()
    {

        $this->view("admin/profile_settings");
    }

    public function student()
    {
        if (!isset($_GET['t'])) {
            Auth::redirect("admin/");
        }
        $data = array();
        switch (Auth::safe_data($_GET['t'])) {
            case "enrolled":
                $data['type'] = "enrolled";
                break;
            case "unregistered":
                $data['type'] = "unregistered";
                break;
            default:
                $data['type'] = "All";
                break;
        }
        $this->view("admin/students", $data);
    }
    public function class()
    {
        if (!isset($_GET['t'])) {
            Auth::redirect("admin/");
        }
        if (Auth::getMethod() == 'POST') {
            if (!isset($_POST['file'])) {
                $res = Helpers::response(array(
                    'state' => 0,
                    'message' => "File not selected.",
                ));
            } else {
                $res = Helpers::response(array(
                    'state' => 0,
                    'message' => "Unknown request.",
                ));
                if (isset($_POST['q'])) {
                    $res = $this->model->add_file($_POST['file'], Auth::safe_data($_GET['t']));
                }
                if (isset($_POST['q1'])) {
                    $res = $this->model->add_timetable($_POST['file'], Auth::safe_data($_GET['t']));
                }
                if (isset($_POST['q2'])) {
                    $res = $this->model->add_test($_POST['file'], Auth::safe_data($_GET['t']));
                }
            }
            $_SESSION[APP]->flashMessage = $res;
        }


        $data = array();
        $data['files'] = $this->model->getFileNames();
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
        $data['t'] = Auth::safe_data($_GET['t']);
        $data['tests'] = $this->model->getTests();
        $this->view("admin/class", $data);
    }
    public function student_overview()
    {
        if (!isset($_GET['id'])) {
            Auth::redirect("admin/");
        }
        $data = array();
        $data = $this->model->getUser(Auth::safe_data($_GET['id']));
        $this->view("admin/student_overview", $data);
    }
    public function test_view()
    {
        if (!isset($_GET['class'])) {
            Auth::redirect("admin/");
        }
        $data = array();
        switch (Auth::safe_data($_GET['class'])) {
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
        $this->view("admin/test_view", $data);
    }
    public function test_view_()
    {
        if (!isset($_GET['id'])) {
            Auth::redirect("admin/");
        }
        $data = array();
        $test = $this->model->loadUploadedTest(Auth::safe_data($_GET['id']));
        if (count($test) == 0) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Test not found.",
            ));
            Helpers::back('admin');
        }
        $data['tests'] = $test;
        $data['test_name'] = $test[0]->name;
        $data['test_time'] = $test[0]->time;
        $this->view("admin/test_view_", $data);
    }
    public function test_delete()
    {
        if (!isset($_GET['id'])) {
            Auth::redirect("admin/");
        }
        $_SESSION[APP]->flashMessage = $this->model->delete_test(Auth::safe_data($_GET['id']));
        Helpers::back('admin');
    }
    public function start_op()
    {
        if (!isset($_GET['id']) || !isset($_GET['type'])) {
            Auth::redirect("admin/");
        }
        if(Auth::safe_data($_GET['type']) == 'start'){
            $_SESSION[APP]->flashMessage = $this->model->start_test(Auth::safe_data($_GET['id']));
            Helpers::back('admin');

        }
        if(Auth::safe_data($_GET['type']) == 'end'){
            $_SESSION[APP]->flashMessage = $this->model->end_test(Auth::safe_data($_GET['id']));
            Helpers::back('admin');

        }
        if(Auth::safe_data($_GET['type']) == 'remove'){
            $_SESSION[APP]->flashMessage = $this->model->remove_test(Auth::safe_data($_GET['id']));
            Helpers::back('admin');

        }

        $_SESSION[APP]->flashMessage = Helpers::response(array(
            'state' => 0,
            'message' => "Error: Unknown operation.",
        ));
        Helpers::back('admin');
    }
    public function test_watch()
    {
        if (!isset($_GET['id'])) {
            Auth::redirect("admin/");
        }
        $data = array();
        switch (Auth::safe_data($_GET['id'])) {
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
        $this->view("admin/test_watch", $data);
    }
}
