<?php
require_once __DIR__ . "/../config/DataBase.php";
require_once __DIR__ . "/../services/AuthService.php";
require_once __DIR__ . "/../repositories/UserRepository.php";


class AuthController {
    private $authService;


    public function __construct() {
        $pdo = DataBase::getConnection();
        $userRepo = new UserRepository($pdo);
        $this->authService = new AuthService($userRepo);
    }


    public function register() {
        try {
            $this->authService->register($_POST['name'], $_POST['email'], $_POST['password']);
            echo "Cadastro Realizado!";
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }


    public function login() {
        try {
            $this->authService->login($_POST["email"], $_POST["password"]);
            echo "Login realizado com sucesso.";
        } catch (Exception $e) {
            echo "Erro" . $e->getMenssage();
        }
    }


    public function logout() {
        $this->authService->logout();
        echo "Logout realizado!";
    }
}

?>