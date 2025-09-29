<?php

require "db.php";

class Product {
    private $dbh;

    public function __construct() {
        $this->dbh = new DB();
    }

public function insertProduct($omschrijving, $foto, $prijs) {
    $sql = "INSERT INTO product (omschrijving, foto, prijsPerStuk) 
            VALUES (:omschrijving, :foto, :prijs)";
    return $this->dbh->run($sql, [":omschrijving" => $omschrijving,":foto" => $foto,":prijs" => $prijs]);
}

public function getAllProducts() {
    $sql = "SELECT productId AS id, omschrijving, foto, prijsPerStuk FROM product";
    return $this->dbh->run($sql)->fetchAll(PDO::FETCH_ASSOC);
}
}
?>