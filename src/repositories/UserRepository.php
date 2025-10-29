<?php
require_once __DIR__ . "/../model/User.php";


class UserRepository {
    private $pdo;


    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }


    public function save(User $user) {
        $stmt = $this->pdo->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$user->getName(), $user->getEmail(), $user->getPasswordHash()]);
    }

    
    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);


        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data["name"], $data["email"], $data["password"]);
        }


        return null;
    }
}


?>