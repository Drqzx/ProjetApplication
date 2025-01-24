<?php

namespace Config;

use PDO;
use PDOException;

class Database {

    private $isLocalhost = true;

    private $localhost = 'localhost';
    private $host = 'hantaoukarim.fr';

    private $db_name = 'FAGPH';
    private $username = 'fagph';
    private $password = 'uAz[sgI]9QtRds*h';
    private $conn;

    // Get the database connection
    public function getConnection() {
        $this->conn = null;

        $host = $this->isLocalhost ? $this->localhost : $this->host;

        try {
            $this->conn = new PDO("mysql:host=" . $host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}