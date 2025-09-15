<?php
require_once '../includes/product-class.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $omschrijving = $_POST['omschrijving'];
    $prijsPerStuk = $_POST['prijsPerStuk'];

    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $fotoNaam = basename($FILES["foto"]["name"]);
    $uploadFile = $uploadDir . uniqid() . "" . $fotoNaam;

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadFile)) {
        $product = new Product();
        $result = $product->insertProduct($omschrijving, $uploadFile, $prijsPerStuk);

        if ($result === true) {
            $message = "Product succesvol toegevoegd.";
        } else {
            $message = $result;
        }
    } else {
        $message = "Fout bij uploaden van de foto.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuw product toevoegen</title>
</head>
<body>
    <h1>Nieuw product toevoegen</h1>

    <?php if (!empty($message)) : ?>
        <p><strong><?= htmlspecialchars($message) ?></strong></p>
    <?php endif; ?>

    <form action="insert-product.php" method="post" enctype="multipart/form-data">
        <label>Omschrijving:
            <input type="text" name="omschrijving" required>
        </label><br><br>

        <label>Prijs per stuk:
            <input type="number" step="0.01" name="prijsPerStuk" required>
        </label><br><br>

        <label>Foto:
            <input type="file" name="foto" accept="image/*" required>
        </label><br><br>

        <button type="submit">Toevoegen</button>
    </form>
</body>
</html>