<?php

class Forgot extends Controller
{
    private $model;
    public function __construct()
    {
        $_SESSION[APP] = isset($_SESSION[APP]) ? $_SESSION[APP] : new stdClass;
        $this->model = $this->model("main_");
    }
    public function index()
    {

        $this->view("forgot");
    }
    public function reset_()
    {
        if (!isset($_GET['token'])) {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Invalid token"
            ));
            Auth::redirect("forgot");
        }
        $token = $this->model->validateToken(Auth::safe_data($_GET['token']));
        if ($token) {
            $t_date = new DateTime($token->date);
            $t_now = new DateTime();
            $interval = $t_date->diff($t_now);
            $minutesDifference = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
            if ($minutesDifference > TOKEN_EXPIRE) {
                $_SESSION[APP]->flashMessage = Helpers::response(array(
                    'state' => 0,
                    'message' => "Token is invalid or has expired."
                ));
                Auth::redirect("forgot");
            }

            $data = [];
            $data['token'] = Auth::safe_data($_GET['token']);

            $data['email'] = $token->user_id;
            $this->view("reset_password", $data);
        }
        $_SESSION[APP]->flashMessage = Helpers::response(array(
            'state' => 0,
            'message' => "Token is invalid or has expired."
        ));
        Auth::redirect("forgot");
    }
    public function reset_new()
    {
        $_SESSION[APP]->flashMessage = Helpers::response(array(
            'state' => 0,
            'message' => "Invalid token"
        ));
        if (Auth::getMethod() != 'POST') {
            $_SESSION[APP]->flashMessage = Helpers::response(array(
                'state' => 0,
                'message' => "Invalid request"
            ));
            Auth::redirect("forgot");
        }
        $token = $this->model->validateToken(Auth::safe_data($_POST['token']));
        if ($token) {
            $user_id = $token->user_id;
            $res = $this->model->updatePassword($user_id, $_POST);
            $_SESSION[APP]->flashMessage = $res;
            if($res->message == 'Password do not match.'){
                Auth::redirect("forgot/reset_?token=".Auth::safe_data($_POST['token']));
            }
        }

        Auth::redirect("forgot");
    }
    public function reset()
    {
        if (Auth::getMethod() == 'POST') {
            $res = $this->model->sendResetLink($_POST);
            $_SESSION[APP]->flashMessage = $res;
        }
        Auth::redirect("forgot");
    }
}
