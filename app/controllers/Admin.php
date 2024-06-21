<?php

class Admin extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {

        $this->view("admin/index");
    }
    public function upload()
    {

        $this->view("admin/fileupload");
    }
    public function test_maker()
    {

        $this->view("admin/test_maker");
    }
    public function new_test()
    {

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
                $data['type'] = "Enrolled";
                break;
            case "unregistered":
                $data['type'] = "Unregistered";
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
        $this->view("admin/class", $data);
    }
    public function student_overview()
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
