<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Torrent</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background-color: #f4f6f8;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .main-navbar {
            background: #212529;
        }

        .main-navbar .nav-link {
            color: rgba(255, 255, 255, 0.8);
        }

        .main-navbar .nav-link:hover {
            color: #ffffff;
        }

        .site-container {
            padding-top: 30px;
            padding-bottom: 30px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark main-navbar shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="/index.php">
            Torrent
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar"
            aria-controls="mainNavbar"
            aria-expanded="false"
            aria-label="Открыть меню"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="/index.php">
                        Главная
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Торренты
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Категории
                    </a>
                </li>

            </ul>

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="/login.php">
                        Войти
                    </a>
                </li>

                <li class="nav-item ms-lg-2">
                    <a class="btn btn-primary" href="/register.php">
                        Регистрация
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>

<main class="container site-container">