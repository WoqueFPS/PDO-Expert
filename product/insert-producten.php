<?php
require_once '../includes/database.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="productNummer" placeholder="Product Nummer" required>
        <input type="text" name="productNaam" placeholder="Product Naam" required>
        <input type="number" step="0.01" name="prijs" placeholder="Prijs" required>
        <input type="text" name="beschrijving" placeholder="Beschrijving" required>
        <input type="text" name="category" placeholder="Categorie" required>
        <input type="submit" name="knop" value="Toevoegen">
    </form>
</body>
</html>