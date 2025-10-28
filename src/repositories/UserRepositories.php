<?php

require_once __DIR__ . "/../model/User.php"

class UserRepository {
    private $pdo;


    public function __construct(PDO $pdo) {
        $this->$pdo;
    }


    public function save(User $user) {
        $stmt = $this->$pdo->prepare("INSER INTO users (name, email, password_hash) VALUES (?, ?, ?)");
        $stmt->execute([$user->getName(), $user->getEmail(), $user->getPasswordHash()]);
    }

    
    public function findByEmail($email) {
        $stmt = $this->$pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt = $this->$pdo->execute([$email]);


        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return New User($data["name"], $data["email"], $data["password_hash"]);
        }


        return null
    }
}


?>