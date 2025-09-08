<?php
require_once '../includes/user-class.php';

$user = new User($pdo);
$user->logout();
?>