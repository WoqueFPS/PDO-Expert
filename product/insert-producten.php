<?php
require_once '../includes/product-class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];

    $filename = $_FILES['file']['name'];
    $location = "upload/" . $filename;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
        $product = new Product();
        if ($product->insertProduct($omschrijving, $location, $prijs)) {
            echo "Product succesvol toegevoegd.";
        } else {
            echo "Fout bij toevoegen product.";
        }
    } else {
        echo "Fout bij uploaden van de foto.";
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