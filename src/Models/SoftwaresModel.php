<?php

namespace Models;

use Config\Database;
use Classes\Software;

require_once __DIR__.'/../../vendor/autoload.php';

class SoftwaresModel
{
    // Récupère tous les logiciels de la base de données
    public function getAllSoftwares(): array
    {
        $sql = "SELECT * FROM softwares"; // Requête SQL pour sélectionner tous les logiciels

        $db = new Database(); // Création d'une instance de la classe Database
        $conn = $db->getConnection(); // Obtention de la connexion à la base de données

        $stmt = $conn->prepare($sql); // Préparation de la requête SQL
        $stmt->execute(); // Exécution de la requête

        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC); // Récupération de tous les résultats sous forme de tableau associatif

        $softwares = [];

        foreach($data as $softwareData) {
            // Création d'une instance de la classe Software avec les données récupérées
            $software = new Software(
                $softwareData['id'],
                $softwareData['name'],
                $softwareData['licence'],
                $softwareData['version']
            );
            $softwares[] = $software; // Ajout du logiciel à la liste des logiciels
        }

        return $softwares;
    }

    // Récupère un logiciel par son identifiant
    public function getSoftwareById($id): Software
    {
        $sql = "SELECT * FROM softwares WHERE id = :id"; // Requête SQL pour sélectionner un logiciel par son identifiant

        $db = new Database(); // Création d'une instance de la classe Database
        $conn = $db->getConnection(); // Obtention de la connexion à la base de données

        $stmt = $conn->prepare($sql); // Préparation de la requête SQL
        $stmt->bindParam(':id', $id); // Liaison du paramètre :id avec la variable $id
        $stmt->execute(); // Exécution de la requête

        $softwareData = $stmt->fetch(\PDO::FETCH_ASSOC); // Récupération du résultat sous forme de tableau associatif

        // Création et retour d'une instance de la classe Software avec les données récupérées
        return new Software(
            $softwareData['id'],
            $softwareData['name'],
            $softwareData['licence'],
            $softwareData['version']
        );
    }

    // Ajoute un logiciel dans la base de données
    public function insertSoftware($software): bool
    {
        $name = $software->getName();
        $licence = $software->getLicence();
        $version = $software->getVersion();

        $sql = "INSERT INTO softwares (name, licence, version) VALUES (:name, :licence, :version)"; // Requête SQL pour insérer un logiciel

        $db = new Database(); // Création d'une instance de la classe Database
        $conn = $db->getConnection(); // Obtention de la connexion à la base de données

        $stmt = $conn->prepare($sql); // Préparation de la requête SQL
        $stmt->bindParam(':name', $name); // Liaison du paramètre :name avec le nom du logiciel
        $stmt->bindParam(':licence', $licence); // Liaison du paramètre :licence avec la licence du logiciel
        $stmt->bindParam(':version', $version); // Liaison du paramètre :version avec la version du logiciel

        try{
            return $stmt->execute(); // Exécution de la requête
        } catch(\Exception $e){
            return false; // Retourne false en cas d'erreur
        }
    }

    // Met à jour un logiciel dans la base de données
    public function updateSoftware($software): bool
    {
        $id = $software->getId();
        $name = $software->getName();
        $licence = $software->getLicence();
        $version = $software->getVersion();

        $sql = "UPDATE softwares SET name = :name, licence = :licence, version = :version WHERE id = :id"; // Requête SQL pour mettre à jour un logiciel

        $db = new Database(); // Création d'une instance de la classe Database
        $conn = $db->getConnection(); // Obtention de la connexion à la base de données

        $stmt = $conn->prepare($sql); // Préparation de la requête SQL
        $stmt->bindParam(':name', $name); // Liaison du paramètre :name avec le nom du logiciel
        $stmt->bindParam(':licence', $licence); // Liaison du paramètre :licence avec la licence du logiciel
        $stmt->bindParam(':version', $version); // Liaison du paramètre :version avec la version du logiciel
        $stmt->bindParam(':id', $id); // Liaison du paramètre :id avec l'identifiant du logiciel
        try{
            return $stmt->execute(); // Exécution de la requête
        } catch(\Exception $e){
            return false; // Retourne false en cas d'erreur
        }
    }

    // Supprime un logiciel de la base de données
    public function deleteSoftware($id): bool
    {
        $sql = "DELETE FROM softwares WHERE id = :id"; // Requête SQL pour supprimer un logiciel

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