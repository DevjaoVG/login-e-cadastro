<?php

// Conexão com bando de dados

class Database {
    private static $instance = null;


    private static function getConnection() {
        if (self::$instance == null) {
            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "";


            self::$instance = new mysqli($this->host, $this->user, $this->password, $this->db); 

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        return self::$instance;
    }
}