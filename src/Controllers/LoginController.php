<?php

namespace Controllers;

use Models\UsersModel;
use Classes\User;

require_once __DIR__ . '/../../vendor/autoload.php';

class LoginController extends Controller {

    private $userModel;

    public function __construct(){
        $this->userModel = new UsersModel();
    }

    private $viewPath = "src/Views/login.php";
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


    public function createUser(){
        $user = new User(null, "test", "test", 0);
        $this->userModel->createUser($user);
    }

    public function verifyUser(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($this->userModel->verifyUser($username, $password)){
            $actualUser = $this->userModel->getUserByUsername($username);
            $actualUser->setPassword($password);

            $_SESSION['actualUser'] = $actualUser;
            $_SESSION['loggedIn'] = true;

            header('Location: ../Hardware');
            exit();

        } else {
            $_SESSION['NOTIFICATION'] = [
                'type' => 'error',
                'message' => 'Identifiants érronés'
            ];

            header('Location: Login');
            exit();
        }
    }

}
