<?php
require_once '../includes/db.php';


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
        <input type="number" name="productId" placeholder="productId" required>
        <input type="number" step="0.01" name="prijs" placeholder="Prijs" required>
        <input type="text" name="beschrijving" placeholder="Beschrijving" required>
        <input type="submit" name="knop" value="Toevoegen">
    </form>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="fileToUpload">Select image to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</html>