<?php

session_start();

require_once __DIR__ . '/../../app/requires.php';
$config = require __DIR__ . '/../../config/app.php';

if (!isset($_SESSION['user'])) {
    die("Auth error");
}

$validTyes = ['image/jpeg', 'image/png'];
$maxSize = 1;


$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES['image'];

$error = false;

$fields = [
    'title' => [
        'value' => $title,
        'msg' => '',
        'error' => false,
    ],
    'description' => [
        'value' => $description,
        'msg' => '',
        'error' => false,
    ],
    'image' => [
        'msg' => '',
        'error' => false,
    ],
];

$size = $image['size'] / 1000000;

if (empty(trim($title))) {
    $error = true;
    $fields['title']['error'] = true;
    $fields['title']['msg'] = "Title cannot be empty";
}

if (empty(trim($description))) {
    $error = true;
    $fields['description']['error'] = true;
    $fields['description']['msg'] = "Description cannot be empty";
}

if ($size > $maxSize) {
    $error = true;
    $fields['image']['error'] = true;
    $fields['image']['msg'] = "Image max size is 1 mb";
}

if (!in_array($image['type'], $validTyes)) {
    $error = true;
    $fields['image']['error'] = true;
    $fields['image']['msg'] = "Image must be jpeg, jpg or png";
}


if ($error) {
    $_SESSION['fields'] = $fields;
    header('Location: /add-ticket.php');
    die();
}


$path = __DIR__ . '/../../uploads';
$filename = uniqid() . '--' . $image['name'];

if (!is_dir($path)) {
    mkdir($path);
}

move_uploaded_file($image['tmp_name'], "$path/$filename");

$query = $db->prepare("INSERT INTO `tickets`(`title`, `description`, `image`, `tag_id`, `user_id`) VALUES (:title, :description, :image, :tag_id, :user_id)");

try {
    $query->execute([
        'title' => $title,
        'description' => $description,
        'image' => "/uploads/$filename",
        'tag_id' => $config['default_tickets_tag'],
        'user_id' => $_SESSION['user'],
    ]);
    header('Location: /my-tickets.php');
    die();
} catch (\PDOException $th) {
    echo $th->getMessage();
}
