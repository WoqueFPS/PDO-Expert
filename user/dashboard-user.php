<?php
require_once '../includes/db.php';

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = new DB();
    }

    public function loginUser($input, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :input OR username = :input";
        $stmt = $this->pdo->run($sql, ['input' => $input]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function registerUser($email, $username, $password, $address, $phone)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email OR username = :username";
        $stmt = $this->pdo->run($sql, ['email' => $email, 'username' => $username]);
        if ($stmt->fetchColumn() > 0) {
            return "E-mail of gebruikersnaam is al in gebruik.";
        }
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (email, username, password, address, phone) VALUES (:email, :username, :password, :address, :phone)";
        try {
            $this->pdo->run($sql, [
                'email' => $email,
                'username' => $username,
                'password' => $hashedPassword,
                'address' => $address,
                'phone' => $phone
            ]);
            return true;
        } catch (PDOException $e) {
            return "Fout bij registratie: " . $e->getMessage();
        }
    }

    public function logout()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
    }
}