<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    require_once '../includes/user-class.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
        $filename = $_FILES['file']['name'];
        $location = "upload/" . $filename;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            echo 'uw bestand is geupload';
        } else {
            echo 'Error';
        }
    }
    ?>


</body>
</html>