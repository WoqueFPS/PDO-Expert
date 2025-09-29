<?php
require "db.php";

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = new DB();
    }

    public function register(String $name, String $password, String $email) {
        $hashPwd = password_hash($password, PASSWORD_DEFAULT);
        $this->pdo->run("INSERT INTO users (naam, password, email) VALUES (:naam, :password, :email)", ["naam" => $name, "password" => $hashPwd, "email" => $email]);
    }

    public function loginUser($email, $password) {
        $user = $this->pdo->run("SELECT * FROM users WHERE email = :email", ["email" => $email])->fetch();
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['naam'] = $user['naam'];
            $_SESSION['email'] = $user['email'];
            return $user;
        }
        return false;
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        return true;
    }
}