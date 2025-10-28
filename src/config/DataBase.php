<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use Dotenv\Dotenv;


// Conexão com bando de dados
class Database {
    private static $instance = null;


    private static function getConnection() {
        if (self::$instance == null) {

            // Cria a instância do Dotenv apontando para a raiz do projeto
            $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
            $dotenv->load();

    
            $db = $_ENV['DB_NAME'] ?? "meu_banco";
            $host = $_ENV['DB_HOST'] ?? "localhost";
            $user = $_ENV['DB_USER'] ?? "root";
            $password = $_ENV['DB_PASS'] ?? "";

            self::$instance = new mysqli($host, $user, $password, $db); 

            if (self::$instance->connect_error) {
                die("Connection failed: " . $self::$instance->connect_error);
            }

            
            // Define charset para UTF-8
            self::$instance->set_charset('utf8mb4');
        }

        return self::$instance;
    }
}