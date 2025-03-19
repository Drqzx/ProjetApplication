<?php

namespace Models;

use Classes\Hardware;
use Config\Database;

require_once __DIR__.'/../../vendor/autoload.php';

class HardwareModel
{
    // Récupère tous les logiciels de la base de données
    public function getAllHardwares(): array
    {
        $sql = "SELECT * FROM hardwares"; // Requête SQL pour sélectionner tous les logiciels

        $db = new Database(); // Création d'une instance de la classe Database
        $conn = $db->getConnection(); // Obtention de la connexion à la base de données

        $stmt = $conn->prepare($sql); // Préparation de la requête SQL
        $stmt->execute(); // Exécution de la requête

        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC); // Récupération de tous les résultats sous forme de tableau associatif

        $hardwares = [];

        foreach($data as $hardwareData) {
            // Création d'une instance de la classe Software avec les données récupérées
            $hardware = new Hardware(
                $hardwareData['id'],
                $hardwareData['name'],
                $hardwareData['type'],
                $hardwareData['brand'],
                $hardwareData['model'],
                $hardwareData['serialNumber']
            );
            $hardwares[] = $hardware; // Ajout du logiciel à la liste des logiciels
        }

        return $hardwares;
    }

    // Récupère un logiciel par son identifiant
    public function getHardwareById($id): Hardware
    {
        $sql = "SELECT * FROM hardwares WHERE id = :id"; // Requête SQL pour sélectionner un logiciel par son identifiant

        $db = new Database(); // Création d'une instance de la classe Database
        $conn = $db->getConnection(); // Obtention de la connexion à la base de données

        $stmt = $conn->prepare($sql); // Préparation de la requête SQL
        $stmt->bindParam(':id', $id); // Liaison du paramètre :id avec la variable $id
        $stmt->execute(); // Exécution de la requête

        $hardwareData = $stmt->fetch(\PDO::FETCH_ASSOC); // Récupération du résultat sous forme de tableau associatif

        // Création et retour d'une instance de la classe Software avec les données récupérées
        return new Hardware(
            $hardwareData['id'],
            $hardwareData['name'],
            $hardwareData['type'],
            $hardwareData['brand'],
            $hardwareData['model'],
            $hardwareData['serialNumber']
        );
    }

    // Ajoute un logiciel dans la base de données
    public function insertHardware($hardware): bool
    {
        $name = $hardware->getName();
        $type = $hardware->getType();
        $brand = $hardware->getBrand();
        $model = $hardware->getModel();
        $serialNumber = $hardware->getSerialNumber();

        $sql = "INSERT INTO hardwares (name, type, brand, model, serialNumber) VALUES (:name, :type, :brand, :model, :serialNumber)"; // Requête SQL pour insérer un logiciel

        $db = new Database(); // Création d'une instance de la classe Database
        $conn = $db->getConnection(); // Obtention de la connexion à la base de données

        $stmt = $conn->prepare($sql); // Préparation de la requête SQL
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':brand', $brand);
        $stmt->bindParam(':model', $model);
        $stmt->bindParam(':serialNumber', $serialNumber);

        try{
            return $stmt->execute(); // Exécution de la requête
        } catch(\Exception $e){
            return false; // Retourne false en cas d'erreur
        }
    }

    // Met à jour un logiciel dans la base de données
    public function updateHardware($hardware): bool
    {
        $id = $hardware->getId();
        $name = $hardware->getName();
        $type = $hardware->getType();
        $brand = $hardware->getBrand();
        $model = $hardware->getModel();
        $serialNumber = $hardware->getSerialNumber();

        $sql = "UPDATE hardwares SET name = :name, type = :type, brand = :brand, model = :model, serialNumber = :serialNumber WHERE id = :id"; // Requête SQL pour mettre à jour un hardwares
        $db = new Database(); // Création d'une instance de la classe Database
        $conn = $db->getConnection(); // Obtention de la connexion à la base de données

        $stmt = $conn->prepare($sql); // Préparation de la requête SQL
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':brand', $brand);
        $stmt->bindParam(':model', $model);
        $stmt->bindParam(':serialNumber', $serialNumber);
        $stmt->bindParam(':id', $id);
        try{
            return $stmt->execute(); // Exécution de la requête
        } catch(\Exception $e){
            return false; // Retourne false en cas d'erreur
        }
    }

    // Supprime un logiciel de la base de données
    public function deleteHardware($id): bool
    {
        $sql = "DELETE FROM hardwares WHERE id = :id"; // Requête SQL pour supprimer un logiciel

        $db = new Database(); // Création d'une instance de la classe Database
        $conn = $db->getConnection(); // Obtention de la connexion à la base de données

        $stmt = $conn->prepare($sql); // Préparation de la requête SQL
        $stmt->bindParam(':id', $id); // Liaison du paramètre :id avec l'identifiant du logiciel
        try{
            return $stmt->execute(); // Exécution de la requête
        } catch(\Exception $e){
            return false; // Retourne false en cas d'erreur
        }
    }
}