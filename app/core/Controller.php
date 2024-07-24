<?php

class Controller {
    public function model($model) {
        require_once '../app/model/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        require_once '../app/view/' . $view . '.php';
    }

    public function getClientIp() {
        $ip = 'UNKNOWN';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
