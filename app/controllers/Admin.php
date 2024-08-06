<?php

class Admin extends Controller
{
    private $model;
    private $modelStudent;
    public function __construct()
    {
        if (!($_SESSION[APP]->is_admin == ADMIN || $_SESSION[APP]->is_admin == STAFF)) {
            Auth::redirect("logout/");
        }
        $this->model = $this->model("admin_");
        $this->modelStudent = $this->model("student_");
    }
    public function index()
    {
        if (Auth::getMethod() == 'POST') {
            if (isset($_POST['file']) || isset($_POST['link'])) {
                if (isset($_POST['q1'])) {
                    $res = $this->model->add_file($_POST['file'], 'general_library');
                }
                if (isset($_POST['q2'])) {
                    $res = $this->model->add_link($_POST);
                }
                if (isset($_POST['q3'])) {
                    $res = $this->model->add_notice($_POST['file']);
                }
            } else {
                $res = Helpers::response(array(
                    'state' => 0,
                    'message' => "File not selected.",
                ));
            }

            $_SESSION[APP]->flashMessage = $res;
        }
        $data = [];
        $data['enrolled'] = $this->model->countEnrolled();
        $data['staffs'] = $this->model->countStaffs();
        $data['unregistered'] = $this->model->countEnrolled(1);
        $data['files'] = $this->model->getFileNames();
        $data['notices'] = $this->model->getNotices();
        $this->view("admin/index", $data);
    }
    public function delete_notice()
    {
        if (!isset($_GET['id'])) {
            $_SESSION[APP]->flashMessage =  Helpers::response(array(
                'state' => 0,
                'message' => "Invalid notice.",
            ));
        }
        $_SESSION[APP]->flashMessage =  $this->model->delete_notice(Auth::safe_data($_GET['id']));

        Helpers::back("admin");
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
        Auth::pageAccess(ADMIN);
        if (!isset($_GET['id'])) {
            $_SESSION[APP]->flashMessage =  Helpers::response(array(
                'state' => 0,
                'message' => "User cannot be empty",
            ));
            Auth::redirect("admin");
        }
        $_SESSION[APP]->flashMessage = $this->model->remove_student(Auth::safe_data($_GET['id']));

        Helpers::back('admin');
    }
    public function staff_delete()
    {
        Auth::pageAccess(ADMIN);
        if (!isset($_GET['id'])) {
            $_SESSION[APP]->flashMessage =  Helpers::response(array(
                'state' => 0,
                'message' => "Staff cannot be empty",
            ));
            Auth::redirect("admin");
        }
        $_SESSION[APP]->flashMessage = $this->model->remove_staff(Auth::safe_data($_GET['id']));

        Helpers::back('admin');
    }
    public function make_admin()
    {
        Auth::pageAccess(ADMIN);
        if (!isset($_GET['id'])) {
            $_SESSION[APP]->flashMessage =  Helpers::response(array(
                'state' => 0,
                'message' => "Staff cannot be empty",
            ));
            Auth::redirect("admin");
        }
        $_SESSION[APP]->flashMessage = $this->model->add_staff(Auth::safe_data($_GET['id']));

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
    public function re_mark()
    {

        if (!isset($_GET['class']) || !isset($_GET['test_id'])) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Class is not set.",
            ));
            Helpers::back('admin');
        }
        $_SESSION[APP]->flashMessage = $this->model->re_markTest(Auth::safe_data($_GET['class']),Auth::safe_data($_GET['test_id']));
        Helpers::back("admin");
    }
    public function test_maker()
    {
        $this->view("admin/test_maker");
    }
    public function new_test()
    {
        if (Auth::getMethod() == 'POST') {
            $response =  $this->model->new_test_name($_POST, $this->model->sanitize_questions($_POST));
            if ($response->state == 0) {
                $_SESSION[APP]->flashMessage = Helpers::response(array(
                    'state' => 0,
                    'message' => $response->message,
                ));
            } else {
            }
            exit();
            // $_SESSION[APP]->flashMessage =  $this->model->new_test($_POST, $this->model->sanitize_questions($_POST));
        }
        $this->view("admin/new_test");
    }
    public function test_name()
    {
        $data = [];
        if (Auth::getMethod() == 'POST') {
            $response =  $this->model->new_test_name($_POST, $this->model->sanitize_questions($_POST));
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => $response->state,
                'message' => $response->message,
            ));
            if ($response->state == 0) {
                Auth::redirect("admin/test_name?id=" . $response->id);
            }
            Auth::redirect("admin/add_question?id=" . $response->id);
        }
        if (isset($_GET['id']) && !empty(Auth::safe_data($_GET['id']))) {
            $id =  $this->model->get_test_name(Auth::safe_data($_GET['id']));
            if (!$id) {
                $_SESSION[APP]->flashMessage = Helpers::response(array(
                    'state' => 0,
                    'message' => "Test not found",
                ));
                Auth::redirect("admin/test_maker");
            }
            $data['test_name'] = $id->name;
            $data['test_time'] = $id->time;
            $data['test_id'] = $id->id;
        }
        $this->view("admin/new_test", $data);
    }
    public function add_question()
    {
        if (!isset($_GET['id']) || empty(Auth::safe_data($_GET['id']))) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Unkown test details.",
            ));
            Auth::redirect("admin/test_maker");
        }
        $data = [];
        if (Auth::getMethod() == 'POST') {
            $_SESSION[APP]->flashMessage = $this->model->new_add_question();
            if ($_SESSION[APP]->flashMessage->state == 1) {
                Auth::redirect("admin/add_question?id=" . $_GET['id'] . "&q_id=" . Auth::safe_data($_SESSION[APP]->flashMessage->question_id));
            }
        }

        $id =  $this->model->get_test_name(Auth::safe_data($_GET['id']));
        $question_ids =  $this->model->get_question_ids(Auth::safe_data($_GET['id']));
        if (!$id) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Test not found",
            ));
            Auth::redirect("admin/test_maker");
        }


        $data['test_name'] = $id->name;
        $data['test_time'] = $id->time;
        $data['question_ids'] = $question_ids;

        if (isset($_GET['q_id']) && !empty(@$_GET['q_id'])) {
            $question =  $this->model->get_test_question(Auth::safe_data($_GET['q_id']));
        // print_r($question);exit();
            if (!$question) {
                $_SESSION[APP]->flashMessage = Helpers::response(array(
                    'state' => 0,
                    'message' => "Test not found",
                ));
                Auth::redirect("admin/test_maker");
            }
            $data['question_text'] = $question[0]->question;
            $data['options'] = $question;
        }
        $this->view('admin/questions', $data);
    }
    public function delete_question()
    {
        if (!isset($_GET['id']) || empty(Auth::safe_data($_GET['id'])) || !isset($_GET['q_id']) || empty(Auth::safe_data($_GET['q_id']))) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Unkown question.",
            ));
            Auth::redirect("admin/test_maker");
        }

        $_SESSION[APP]->flashMessage = $this->model->new_delete_question();
        Auth::redirect("admin/add_question?id=" . $_GET['id']);
    }
    public function profile()
    {
        if (Auth::getMethod() == 'POST') {
            if (isset($_POST['q'])) {
                $res = $this->modelStudent->updateProfile($_POST);
                $_SESSION[APP]->flashMessage = $res;
            }
            if (isset($_POST['q1'])) {
                $res = $this->modelStudent->updatePassword($_POST);
                $_SESSION[APP]->flashMessage = $res;
            }
        }
        $data = $this->model->getUser($_SESSION[APP]->email);

        $this->view("admin/profile_settings", $data);
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
    public function staffs()
    {
        Auth::pageAccess(ADMIN);
        $data = array();
        $this->view("admin/staffs", $data);
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
        $data['type'] = CLASSESS[Auth::safe_data($_GET['t'])];
        $data['t'] = Auth::safe_data($_GET['t']);
        $data['tests'] = $this->model->getTests();
        $this->view("admin/class", $data);
    }
    public function student_overview()
    {
        if (!isset($_GET['id'])) {
            Auth::redirect("admin/");
        }
        if (Auth::getMethod() == 'POST') {
            $res = Helpers::response(array(
                'state' => 0,
                'message' => "Error: Unknown operation.",
            ));
            if (isset($_POST['q2'])) {
                $res = $this->model->unregisterUser($_POST);
            }
            if (isset($_POST['q1'])) {
                $res = $this->model->updateUser($_POST);
            }
            $_SESSION[APP]->flashMessage = $res;
        }
        $data = array();
        $data = (array) $this->model->getUser(Auth::safe_data($_GET['id']));
        $report = $this->model->getReport(Auth::safe_data($_GET['id']), $this->modelStudent->getAverageScore($data['current_class'], $data['email']));
        $data = array_merge($data, $report);
        // print_r($data);exit();
        $this->view("admin/student_overview", $data);
    }
    public function send_report_email()
    {
        if (!(isset($_GET['id']) || isset($_GET['class']))) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Cannot send report to undefined students.",
            ));
            Helpers::back("admin");
        }
        $ids = isset($_GET['id']) ? [(object)['id' => Auth::safe_data($_GET['id'])]] : $this->model->getClassIds(Auth::safe_data($_GET['class']));
        $_SESSION[APP]->flashMessage = $this->model->send_report_email($ids);
        Helpers::back("admin");
    }
    public function test_view()
    {
        if (!isset($_GET['class'])) {
            Auth::redirect("admin/");
        }
        $this->view("admin/test_view");
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
        if (Auth::safe_data($_GET['type']) == 'start') {
            $_SESSION[APP]->flashMessage = $this->model->start_test(Auth::safe_data($_GET['id']));
            Helpers::back('admin');
        }
        if (Auth::safe_data($_GET['type']) == 'end') {
            $_SESSION[APP]->flashMessage = $this->model->end_test(Auth::safe_data($_GET['id']));
            Helpers::back('admin');
        }
        if (Auth::safe_data($_GET['type']) == 'remove') {
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
        if (!isset($_GET['id']) || !isset($_GET['user_id'])) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => 'Unknown student\'s details.'
            ));
            Helpers::back("admin");
        }
        $test_details = $this->modelStudent->getTestDetails(Auth::safe_data($_GET['id']));
        $data = [];
        $data['id'] = Auth::safe_data($_GET['id']);
        $data['timer'] = $test_details->time;
        $data['test_name'] = $test_details->name;
        $test = $this->model->loadUploadedTest(Auth::safe_data($_GET['id']));
        $test_submit = $this->model->getSubmitted(Auth::safe_data($_GET['id']), Auth::safe_data($_GET['user_id']));

        if (count($test) == 0 || !$test_submit) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Unable to fetch test details.",
            ));
            Helpers::back('admin');
        }
        $data['tests'] = $test;
        $data['test_submit'] = $test_submit;


        $this->view("admin/test_watch", $data);
    }
}
