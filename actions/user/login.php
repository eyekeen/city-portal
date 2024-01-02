<?php

session_start();

require_once __DIR__ . '/../../app/requires.php';

$email = $_POST['email'];
$password = $_POST['password'];


$query = $db->prepare("SELECT * FROM users WHERE email = :email");

$query->execute([
    'email' => $email,
]);

$user = $query->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    $_SESSION['auth_error'] = true;
    header('Location: /login.php');
    die();
}

if (!password_verify($password, $user['password'])) {
    $_SESSION['auth_error'] = true;
    header('Location: /login.php');
    die();
}

$_SESSION['user'] = [];
$_SESSION['user']['id'] = $user['id'];
$_SESSION['user']['name'] = $user['name'];

header('Location: /');
