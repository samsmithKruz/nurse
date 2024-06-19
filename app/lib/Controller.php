<?php

class Controller
{

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            extract((array)$data);
            require_once '../app/views/' . $view . '.php';
        } else {
            require_once '../app/views/404.php';
        }
        exit();
    }
}
