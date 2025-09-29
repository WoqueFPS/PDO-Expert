<?php

class DB {
    protected $pdo;
    public function __construct($db = "winkel", $user = "root", $pwd = "", $host = "localhost") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        } catch (PDOException $e) {
            die("connection failed: ") . $e->getMessage();
        }
    }
     public function run($sql, $args = [null]) {

        $sql = $this->pdo->prepare($sql);

        $sql->execute($args);

        return $sql;
    }
}
