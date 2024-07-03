<?php

class Database
{
    private static $instance = null;
    private $conn;

    // TODO: Move to .env
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'blog';

    private function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->name}", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
