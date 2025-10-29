<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use Dotenv\Dotenv;


// Conexão com bando de dados
class Database {
    private static $instance = null;


    public static function getConnection() {
        if (self::$instance == null) {

            // Cria a instância do Dotenv apontando para a raiz do projeto
            $dotenv = Dotenv::createImmutable(__DIR__ . "/../../config");
            $dotenv->load();

            try {
                $host = $_ENV['DB_HOST'] ?? "localhost";
                $user = $_ENV['DB_USER'] ?? "root";
                $password = $_ENV['DB_PASS'] ?? "";
                $db = $_ENV['DB_NAME'] ?? "meu_banco";
            } catch (PDOException $e) {
                die("Erro de conexão: " . $e->getMenssage());
            }
            

            self::$instance = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $password);
        }

        return self::$instance;
    }
}