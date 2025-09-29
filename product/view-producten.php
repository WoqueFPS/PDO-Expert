<?php
require_once '../includes/product-class.php';

$product = new Product();
$products = $product->getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>
</head>
<body>
    <h1>Producten</h1>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Omschrijving</th>
            <th>Foto</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($products as $prod): ?>
        <tr>
        <td><?php echo $prod['id']; ?></td>
        <td><?php echo $prod['omschrijving']; ?></td>
        <td><img src="<?php echo $prod['foto']; ?>" width="100"></td>
        <td><?php echo $prod['prijsPerStuk']; ?></td>
                <button>Bewerken</button>
                <button>Verwijderen</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>