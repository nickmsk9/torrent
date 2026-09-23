<?php

// подключения

require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/config.php';
require_once __DIR__ . '/incs/functions.php';

// подключения

// запуск сессии


session_start();

// запуск сессии


//    если пользователь не авторизован — отправляем на login.php


if (!isset($_SESSION['data'])) {
    redirect('login.php');
}


//    если пользователь не авторизован — отправляем на login.php

$stmt=$db->prepare("SELECT * FROM users WHERE email=:email");
$stmt->execute(['email'=>$_SESSION['data']]);
$user=$stmt->fetch(PDO::FETCH_ASSOC);
dump ($user);

