<?php
require_once 'db.php';

class Product {
    private $pdo;

    public function __construct() {
        $this->pdo = new DB();
    }

    public function insertProduct($omschrijving, $foto, $prijsPerStuk) {
        $sql = "INSERT INTO product (omschrijving, foto, prijsPerStuk) 
                VALUES (:omschrijving, :foto, :prijsPerStuk)";
        try {
            $this->pdo->run($sql, [
                'omschrijving' => $omschrijving,
                'foto' => $foto,
                'prijsPerStuk' => $prijsPerStuk
            ]);
            return true;
        } catch (PDOException $e) {
            return "Fout bij toevoegen product: " . $e->getMessage();
        }
    }
}
?>