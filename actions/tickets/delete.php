<?php

session_start();

require_once __DIR__ . '/../../app/requires.php';

$config = require __DIR__ . '/../../config/app.php';

if (!isset($_SESSION['user'])) {
    die("Auth error");
}

$id = $_POST['id'];

// TODO: validation

$query = $db->prepare("SELECT user_id FROM tickets WHERE id = :id");
$query->execute(['id' => $id]);
$ticket = $query->fetch(PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT * FROM users WHERE id = :id");
$query->execute([
    'id' => $_SESSION['user'],
]);
$user = $query->fetch(PDO::FETCH_ASSOC);

if ($ticket['user_id'] !== $_SESSION['user'] || (int)$user['group_id'] !== $config['admin_user_group'] ) {
    die("This is not your post");
}


try {
    $query = $db->prepare("DELETE FROM tickets WHERE id = :id");
    $query->execute([
        'id' => $id
    ]);
    // TODO: fix that moment with redirect for admin and citizen
    header('Location: /my-tickets.php');
    die();
} catch (\PDOException $th) {
    echo $th->getMessage();
}
