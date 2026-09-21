<?php

if (PHP_OS_FAMILY === 'Windows') {
    // Windows + XAMPP
    $dsn = 'mysql:host=localhost;dbname=torrent;charset=utf8mb4';
    $user = 'root';
    $password = '';
} else {
    // Mac + Docker
    $dsn = 'mysql:host=db;dbname=torrent;charset=utf8mb4';
    $user = 'torrent';
    $password = 'torrent';
}

$db = new PDO($dsn, $user, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);