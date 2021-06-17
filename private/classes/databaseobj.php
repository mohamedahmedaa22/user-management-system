<?php

namespace Classes;

use PDO;
use PDOException;

class DatabaseOBj {
    
    private $server;
    private $dbName;
    private $dbUser;
    private $dbPassword;

    public $conn;

    public function __construct($server, $dbName, $dbUser, $dbPassword) {
        $this->server = $server;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
    }

    public function connect() {
        try {
            $this->conn  = new PDO("mysql:host=$this->server;dbname=$this->dbName", $this->dbUser, $this->dbPassword);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return "Database Error: ". $e->getMessage();
        }
        return $this->conn;
    }

    public function disconnect() {
        $this->conn = null;
    }
}