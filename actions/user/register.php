<?php
// TODO: need modernization
session_start();

require_once __DIR__ . '/../../app/requires.php';

$config = require __DIR__ . '/../../config/app.php';

$email = $_POST['email'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$password = $_POST['password'];
$passwordConfirmation = $_POST['password_confirmation'];

$error = false;

$fields = [
    'email' => [
        'value' => $email,
        'error' => false,
    ],
    'name' => [
        'value' => $name,
        'error' => false,
    ],
    'dob' => [
        'value' => $dob,
        'error' => false,
    ],
    'password' => [
        'error' => false,
    ]
];


if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $fields['email']['error'] = true;
}


if (empty($name)) {
    $error = true;
    $fields['name']['error'] = true;
}

if (empty($name)) {
    $error = true;
    $fields['dob']['error'] = true;
}

if ($password !== $passwordConfirmation) {
    $error = true;
    $fields['password']['error'] = true;
}

if ($error) {
    $_SESSION['fields'] = $fields;
    header('Location: /register.php');
    die();
}

$query = $db->prepare("INSERT INTO `users`(`email`, `name`, `dob`, `password`, `group_id`) VALUES (:email, :name, :dob, :password, :group_id)");


try {
    $query->execute([
        'email' => $email,
        'name' => $name,
        'dob' => $dob,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'group_id' => $config['default_user_group'],
    ]);
    header('Location: /login.php');
} catch (\PDOException $ex) {
    $_SESSION['fields'] = $fields;
    header('Location: /register.php');
    die();
}
