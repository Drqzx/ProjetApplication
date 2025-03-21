<?php
namespace Models;

use Config\Database;
use Classes\User;

require_once __DIR__.'/../../vendor/autoload.php';

class UsersModel {

    public function getUserByUsername($username): ?User {
        $sql = "SELECT * FROM users WHERE username = :username";

        $db = new Database();
        $conn = $db->getConnection();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user) {
            return new User($user['id'], $user['username'], $user['password'], $user['role']);
        } else {
            return null;
        }
    }

    public function createUser(User $user): bool {
        $username = $user->getUsername();
        $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $role = $user->getRole();


        $sql = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";

        $db = new Database();
        $conn = $db->getConnection();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        try {
            return $stmt->execute();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function verifyUser($username, $password): bool {
        $sql = "SELECT * FROM users WHERE username = :username";

        $db = new Database();
        $conn = $db->getConnection();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user) {
            return password_verify($password, $user['password']);
        } else {
            return false;
        }
    }

}


