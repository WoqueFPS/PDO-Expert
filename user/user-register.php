<?php
require_once '../includes/user-class.php';


try {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();

    $name = htmlspecialchars($_POST['name']);
    $password = $_POST['password'];
    $email = htmlspecialchars($_POST['email']);

    $user->register($name, $password, $email);
    echo "registratie gelukt";
    header("refresh:2, url = ../dashboard-user.php");
}
} catch (Exception $e) {
    $message = $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Account aanmaken</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit">
    </form>
</body>
</html>