<?php

namespace Models;

use Config\Database;
use Classes\Software;

require_once __DIR__.'/../../vendor/autoload.php';

class TestModel
{
   public function getTest($id){
       $sql = "SELECT * FROM test WHERE id = :id"; // Requête SQL pour sélectionner un logiciel par son identifiant

       $db = new Database(); // Création d'une instance de la classe Database
       $conn = $db->getConnection(); // Obtention de la connexion à la base de données

       $stmt = $conn->prepare($sql); // Préparation de la requête SQL
       $stmt->bindParam(':id', $id); // Liaison du paramètre :id avec la variable $id
       $stmt->execute(); // Exécution de la requête

       $pass = $stmt->fetch(\PDO::FETCH_ASSOC); // Récupération du résultat sous forme de tableau associatif

       return $pass['pass'];
   }

   public function createTest($pass){

       $pass = password_hash($pass, PASSWORD_DEFAULT);

       $sql = "INSERT INTO test (pass) VALUES (:pass)"; // Requête SQL pour insérer un logiciel

       $db = new Database(); // Création d'une instance de la classe Database
       $conn = $db->getConnection(); // Obtention de la connexion à la base de données

       $stmt = $conn->prepare($sql); // Préparation de la requête SQL
       $stmt->bindParam(':pass', $pass); // Liaison du paramètre :name avec le nom du logiciel

       try{
           return $stmt->execute(); // Exécution de la requête
       } catch(\Exception $e){
           return false; // Retourne false en cas d'erreur
       }
   }
}