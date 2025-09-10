<?php
require 'database.php';

class Product {
    public function __construct() {
        return $this->$dbh->execute("INSERT INTO product (productId, prijs, beschrijving)
        VALUES (:productId, :prijs, :beschrijving)",
        ['productId' => $productId, 'prijs' => $prijs, 'beschrijving' => $beschrijving]);
    }
}

?>