<?php

namespace Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use Classes\Hardware;
use Models\HardwareModel;

class HardwareController extends Controller {
    private $hardwareModel;
    private $viewPath = "src/Views/HardwareView.php";

    public function __construct(){
        $this->hardwareModel = new HardwareModel();
    }

    public function index() {
        // Récupération des matériels
        $hardwares = $this->hardwareModel->getAllHardwares();

        // Vérifie si la vue existe -> si elle n'existe pas, redirige vers la page de connexion
        $this->existView($this->viewPath);

        // Afficher la notification (si elle existe)
        $this->showNotification();

        // Affiche la vue
        require_once $this->viewPath;
    }

    public function insertHardware() {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $serialNumber = $_POST['serialNumber'];

        $hardware = new Hardware(null, $name, $type, $brand, $model, $serialNumber);

        if($this->hardwareModel->insertHardware($hardware)){
            $_SESSION['NOTIFICATION'] = [
                'type' => 'success',
                'message' => 'Le matériel a bien été ajouté'
            ];

            header('Location: Hardware');
            exit();
        } else{
            $_SESSION['NOTIFICATION'] = [
                'type' => 'error',
                'message' => 'Une erreur est survenue lors de l\'ajout du matériel'
            ];

            header('Location: Hardware');
            exit();
        }
    }

    public function deleteHardware(){
        $id = $_POST['id'];

        if($this->hardwareModel->deleteHardware($id)){
            $_SESSION['NOTIFICATION'] = [
                'type' => 'success',
                'message' => 'Le matériel a bien été supprimé'
            ];

            header('Location: Hardware');
            exit();
        } else{
            $_SESSION['NOTIFICATION'] = [
                'type' => 'error',
                'message' => 'Une erreur est survenue lors de la suppression du matériel'
            ];

            header('Location: Hardware');
            exit();
        }
    }

    public function updateHardware(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $serialNumber = $_POST['serialNumber'];

        $hardware = new Hardware($id, $name, $type, $brand, $model, $serialNumber);

        if($this->hardwareModel->updateHardware($hardware)){
            $_SESSION['NOTIFICATION'] = [
                'type' => 'success',
                'message' => 'Le matériel a bien été modifié'
            ];

        } else{
            $_SESSION['NOTIFICATION'] = [
                'type' => 'error',
                'message' => 'Une erreur est survenue lors de la modification du matériel'
            ];
        }

        header('Location: Hardware');
        exit();

    }

    public function addTestHardwares(){
        for($i = 0; $i < 20; $i++){
            $hardware = new Hardware(null, 'Matériel ' . $i, 'Type ' . $i, 'Marque ' . $i, 'Modèle ' . $i, 'Numéro de série ' . $i);

            echo $this->hardwareModel->insertHardware($hardware);

        }
        //header("Location: Hardware");
        //exit();
    }
}