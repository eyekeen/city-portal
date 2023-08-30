<?php

try {
    $config = require_once __DIR__ . '/../config/db.php';

    $db = new PDO("{$config['driver']}:host={$config['host']};dbname={$config['dbname']};port={$config['port']}", $config['user'], $config['password']);
} catch (\PDOException $th) {
    require_once __DIR__ . '/../components/db-connect-error.php';
    die();
}
