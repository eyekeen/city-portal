<?php

session_start();

require_once __DIR__ . '/../../app/requires.php';

$config = require __DIR__ . '/../../config/app.php';

// TODO: only admin have access to update
if (!isset($_SESSION['user'])) {
    die("You are not admin!");
}


$id = $_POST['id'];
$tag = $_POST['tag'];

$q = $db->prepare("SELECT * FROM ticket_tags WHERE id = :id");
$q->execute(['id' => $tag]);
$tagExists = $q->fetch();

if (!$tagExists) {
    die("Not found such tag");
}

$query = $db->prepare("SELECT * FROM users WHERE id = :id");
$query->execute([
    'id' => $_SESSION['user'],
]);
$user = $query->fetch(PDO::FETCH_ASSOC);

if ((int)$user['group_id'] === $config['admin_user_group']) {
    try {
        $q = $db->prepare("UPDATE tickets SET tag_id = :tag WHERE id = :id");
        $q->execute([
            'id' => $id,
            'tag' => $tag,
        ]);
        header('Location: /tickets-control.php');
        die();
    } catch (\PDOException $th) {
        die($th->getMessage());
    }
} else {
    die("You are not admin");
}
