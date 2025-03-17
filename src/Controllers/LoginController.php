<?php

namespace Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

class LoginController extends Controller {

    private $viewPath = "src/Views/login.html";
    public function index() {
        // Vérifie si la vue existe -> si elle n'existe pas, redirige vers la page de connexion
        $this->existView($this->viewPath);

        // Afficher la notification (si elle existe)
        $this->showNotification();

        // Affiche la vue
        require_once $this->viewPath;
    }

    public function Logout(){
        session_destroy();
        header('Location: Login');
        exit();
    }
}
