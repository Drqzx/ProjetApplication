<?php

namespace Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use Classes\Software;
use Models\SoftwaresModel;

class SoftwareController extends Controller {
    private $softwaresModel;
    private $viewPath = "src/Views/softwareView.php";

    public function __construct(){
        $this->softwaresModel = new SoftwaresModel();
    }

    public function index() {
        // Récupération des logiciels
        $softwares = $this->softwaresModel->getAllSoftwares();

        // Vérifie si la vue existe -> si elle n'existe pas, redirige vers la page de connexion
        $this->existView($this->viewPath);

        // Afficher la notification (si elle existe)
        $this->showNotification();

        // Affiche la vue
        require_once $this->viewPath;
    }

    public function insertSoftware() {
        $name = $_POST['name'];
        $licence = $_POST['licence'];
        $version = $_POST['version'];

        $software = new Software(null, $name, $licence, $version);

        if($this->softwaresModel->insertSoftware($software)){
            $_SESSION['NOTIFICATION'] = [
                'type' => 'success',
                'message' => 'Le logiciel a bien été ajouté'
            ];

            header('Location: Software');
            exit();
        } else{
            $_SESSION['NOTIFICATION'] = [
                'type' => 'error',
                'message' => 'Une erreur est survenue lors de l\'ajout du logiciel'
            ];

            header('Location: Software');
            exit();
        }
    }

    public function deleteSoftware(){
        $id = $_POST['id'];

        if($this->softwaresModel->deleteSoftware($id)){
            $_SESSION['NOTIFICATION'] = [
                'type' => 'success',
                'message' => 'Le logiciel a bien été supprimé'
            ];

            header('Location: Software');
            exit();
        } else{
            $_SESSION['NOTIFICATION'] = [
                'type' => 'error',
                'message' => 'Une erreur est survenue lors de la suppression du logiciel'
            ];

            header('Location: Software');
            exit();
        }
    }

    public function updateSoftware(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $licence = $_POST['licence'];
        $version = $_POST['version'];

        $software = new Software($id, $name, $licence, $version);

        if($this->softwaresModel->updateSoftware($software)){
            $_SESSION['NOTIFICATION'] = [
                'type' => 'success',
                'message' => 'Le logiciel a bien été modifié'
            ];

        } else{
            $_SESSION['NOTIFICATION'] = [
                'type' => 'error',
                'message' => 'Une erreur est survenue lors de la modification du logiciel'
            ];
        }

        header('Location: Software');
        exit();

    }

    public function addTestSoftwares(){
        for($i = 0; $i < 20; $i++){
            $software = new Software(null, 'Logiciel ' . $i, 'Licence ' . $i, 'Version ' . $i);
            $this->softwaresModel->insertSoftware($software);
        }

        header("Location: Software");
        exit();
    }
}
