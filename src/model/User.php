<?php

class User {
    private $id;
    private $name;
    private $email;
    private $passwordHash;


    public function __construct($name, $email, $passwordHash, $id = null) {
        $this->name = $name;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->id = $id;
    }

    
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
    public function getPasswordHash() { return $this->passwordHash; }
}

?>