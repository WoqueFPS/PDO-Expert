<?php
require "../includes/user-class.php";

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = new User();

        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        $loggedInUser = $user->loginUser($email, $password);

        if ($loggedInUser) {
            echo "Login succesvol! Welkom " . htmlspecialchars($loggedInUser['naam']);
            header("refresh:2;url=../dashboard-user.php");
            exit;
        } else {
            echo "Verkeerde inloggegevens.";
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>
