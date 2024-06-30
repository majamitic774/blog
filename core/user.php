<?php

require_once 'core/autoload.php';
// require_once 'database.php';

class User
{
    private $conn;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function login($username, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    public function register($username, $password, $email)
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->conn->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':email', $email);

        return $stmt->execute();
    }

    public function getUserById($userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateUser($userId, $username, $email)
    {
        $stmt = $this->conn->prepare("UPDATE users SET username = :username, email = :email WHERE id = :id");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $userId);
        return $stmt->execute();
    }

    public function deleteUser($userId)
    {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId);
        return $stmt->execute();
    }
}
