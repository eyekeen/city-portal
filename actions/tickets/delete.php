<?php

session_start();

require_once __DIR__ . '/../../app/requires.php';

$config = require __DIR__ . '/../../config/app.php';

if (!isset($_SESSION['user'])) {
    die("Auth error");
}

$id = $_POST['id'];



$query = $db->prepare("SELECT user_id FROM tickets WHERE id = :id");
$query->execute(['id' => $id]);
$ticket = $query->fetch(PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT * FROM users WHERE id = :id");
$query->execute([
    'id' => $_SESSION['user'],
]);
$user = $query->fetch(PDO::FETCH_ASSOC);

if ($ticket['user_id'] !== $_SESSION['user'] && (int)$user['group_id'] !== $config['admin_user_group']) {
    die("This is not your post");
}

if (!ctype_digit($id)) {
    $_SESSION['delete_error'] = 'Id must be a number';
    if ((int)$user['group_id'] === $config['admin_user_group']) {
        header('Location: /tickets-control.php');
        die();
    } elseif ((int)$user['group_id'] === $config['default_user_group']) {
        header('Location: /my-tickets.php');
        die();
    }
}


try {
    $query = $db->prepare("DELETE FROM tickets WHERE id = :id");
    $query->execute([
        'id' => $id
    ]);
    if ((int)$user['group_id'] === $config['admin_user_group']) {
        header('Location: /tickets-control.php');
        die();
    } elseif ((int)$user['group_id'] === $config['default_user_group']) {
        header('Location: /my-tickets.php');
        die();
    }
} catch (\PDOException $th) {
    echo $th->getMessage();
}
