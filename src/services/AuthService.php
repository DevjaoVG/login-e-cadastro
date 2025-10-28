<?php

require_once __DIR__ . "/../model/User.php";


class AuthService {
    private $userRepo;


    public function __construct(UserRepository $repo) {
        $this->userRepo = $repo;
    }


    public function register($name, $email, $passaword) {
        if ($this->userRepo->findByEmail($email)) {
            throw new Exception("E-mail já cadastrado.");
        }

        $passawordHash = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($name, $email, $passawordHash);
        $this->userRepo->save($user);
    }


    public function login($email, $passaword) {
        $user = $this->userRepo->findByEmail($email);

        if (!$user || !password_verify($passaword, $user->getPasswordHash())) {
            throw new Exception("E-mail ou Senha invalidos.");
        }

        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_name'] = $user->getName();

        return $user;
    }


    public function logout() {
        session_destroy();
    }
}


?>