<?php

namespace Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

class simpleController {
    public function index() {
        require_once "src/Views/simpleView.php";
    }
}