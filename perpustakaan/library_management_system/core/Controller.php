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
        require_once '../app/views/' . $view . '.php';
    }
    public function checkAuth()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /library_management_system/public/login/index');
            exit();
        }
    }

}
