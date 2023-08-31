<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    session_start();
    unset($_SESSION['user']);
    session_destroy();
    header('Location: /login.php');
} else {
    echo 'Error handle action';
    die();
}


