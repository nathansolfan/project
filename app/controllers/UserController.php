<?php

class UserController extends Controller {
    public function index() {
        $this->view('user/login');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->model('User');
            $user->register($_POST['username'], $_POST['password']);
            header('Location: /phpproject/project/public/index.php/user/login');
        } else {
            $this->view('user/register'); // This should render the register.php view
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->model('User');
            if ($user->login($_POST['username'], $_POST['password'])) {
                header('Location: /phpproject/project/public/index.php/user/dashboard');
            } else {
                $this->view('user/login', ['error' => 'Invalid username or password']);
            }
        } else {
            $this->view('user/login');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /phpproject/project/public/index.php/user/login');
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /phpproject/project/public/index.php/user/login');
            exit();
        }
        $this->view('user/dashboard');
    }
}
