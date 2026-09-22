<?php

require_once __DIR__ . '/../incs/config.php';
require_once __DIR__ . '/../incs/lang.php';


?>

<!doctype html>
<html lang="ru">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title><?= $titlemain ?></title>
    <link rel="shortcut icon" href="/pic/favicon.ico" type="image/x-icon" />

    <link
    rel="stylesheet"
    href="<?= $baseUrl ?>/templates/font.css"
>

   <link
    rel="stylesheet"
    href="<?= $baseUrl ?>/templates/app.css"
>

</head>


<body>


<header class="site-header">

    <div class="container header-inner">


       <!-- Логотип -->

<a href="<?= $baseUrl ?>/index.php" class="logo">

    <img
        src="<?= $baseUrl ?>/pic/logo.png"
        alt="Torrent"
        style="height: 45px; width: auto;"
    >

</a>

        <!-- Главное меню -->

        <nav class="main-nav">

            <a href="<?= $baseUrl ?>/index.php">
                <?= $lang['home'] ?>
            </a>

            <a href="<?= $baseUrl ?>/torrents.php">
                Торренты
            </a>

            

        </nav>


        <!-- Пользователь -->

        <div class="user-nav">

            <?php if (isset($_SESSION['user'])): ?>


                <a href="<?= $baseUrl ?>/add_torrent.php">
                    Добавить раздачу
                </a>


                <a href="<?= $baseUrl ?>/userdetails.php">
                    Мой профиль
                </a>


                <a href="<?= $baseUrl ?>/logout.php">
                    Выйти
                </a>


            <?php else: ?>


                <a href="<?= $baseUrl ?>/login.php">
                    Войти
                </a>


                <a href="<?= $baseUrl ?>/register.php" class="btn btn-primary">
                    Регистрация
                </a>


            <?php endif; ?>

        </div>


    </div>

</header>


<main class="site-main">

    <div class="container">