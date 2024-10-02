<?php
class App {
    protected $controller = 'LoginController'; // Default controller if not logged in
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        session_start(); // Start session for user authentication

        if (true) {
            $url = $this->parseUrl();

            if (isset($url[0]) && file_exists('../app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
                $this->controller = ucfirst($url[0]) . 'Controller';
                unset($url[0]);
            }

            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            if (isset($url[1]) && method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }

            $this->params = $url ? array_values($url) : [];
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            // If not logged in, always redirect to the login page
            $this->controller = 'LoginController';
            require_once '../app/controllers/LoginController.php';
            $this->controller = new LoginController();
            $this->controller->index();
        }
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
