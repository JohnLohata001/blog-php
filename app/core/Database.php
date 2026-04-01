<?php

// app/core/Database.php
class Database {

    private $host = 'localhost';
    private $db_name = 'blog_sept';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function dbConnection() {

        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {

            require '../app/views/admin/error.view.php';           
            exit;
        }
        return $this->conn;
        
    }
}
