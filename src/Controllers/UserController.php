<?php

namespace Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

class UserController extends Controller {

    private $viewPath = "src/Views/user.php";

    public function index() {

        $this->isLoggedIn();
        // Vérifie si la vue existe -> si elle n'existe pas, redirige vers la page de connexion
        $this->existView($this->viewPath);

        // Afficher la notification (si elle existe)
        $this->showNotification();

        $actualUser = $_SESSION['actualUser'];

        // Affiche la vue
        require_once $this->viewPath;
    }
}
