<?php

class App {
    // default values
    protected $controller = 'UserController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        // Skip 'index.php' segment if present
        if ($url && $url[0] == 'index.php') {
            unset($url[0]);
            $url = array_values($url); // Re-index array
        }

        if ($url && file_exists(__DIR__ . '/../controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // INCLUDE CONTROLLER FILE
        $controllerPath = __DIR__ . '/../controllers/' . $this->controller . '.php';

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
        } else {
            echo "Controller file not found: " . $controllerPath;
            exit();
        }

        // INSTANTIATE CONTROLLER
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    // CALL CONTROLLER METHOD

    public function parseUrl() {
        if (isset($_SERVER['REQUEST_URI'])) {
            $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
            $url = str_replace('project/public/', '', $url); // Adjust this path if needed
            return explode('/', filter_var($url, FILTER_SANITIZE_URL));
        }
        return [];
    }
}

