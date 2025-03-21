<?php

namespace Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

Class Controller {
    public function existView($viewPath){
        if(!file_exists($viewPath)){

            $_SESSION['NOTIFICATION'] = [
                'type' => 'error',
                'message' => "La page demandée n'éxiste pas"
            ];

            header('Location: Login');
            exit();
        }
    }

    private $viewPath = "src/Views/notification.php";

    public function showNotification(){
        if(isset($_SESSION['NOTIFICATION'])){

            // Récupération des données de la notification
            $type = $_SESSION['NOTIFICATION']['type'];
            $message = $_SESSION['NOTIFICATION']['message'];

            // Attribution de la couleur en fonction du type de notification
            if($type == 'error') {
                $bColor = 'black';
                $tColor = 'white';
            } else{
                $bColor = 'white';
                $tColor = 'black';
            }

            // Affichage de la notification
            $this->existView($this->viewPath);

            // Aficher la notification
            require_once $this->viewPath;

            // Suppression de la notification
            unset($_SESSION['NOTIFICATION']);

        }
    }

    public function isLoggedIn(){
        if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
            $_SESSION['NOTIFICATION'] = [
                'type' => 'error',
                'message' => 'Vous devez être connecté pour accéder à cette page'
            ];

            header('Location: Login');
            exit();
        }
    }
}