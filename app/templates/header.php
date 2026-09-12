<?php

require_once __DIR__ . '/../incs/lang.php';

?>

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
        :root {
            --bg: #f6f7fb;
            --surface: rgba(255, 255, 255, 0.82);
            --surface-strong: #ffffff;

            --text: #18181b;
            --muted: #7c8290;

            --border: rgba(20, 24, 32, 0.08);

            --accent: #6d5dfc;
            --accent-soft: rgba(109, 93, 252, 0.10);

            --shadow-soft: 0 12px 40px rgba(20, 24, 32, 0.08);
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;

            margin: 0;
            background:
                    radial-gradient(circle at 10% 0%, rgba(109, 93, 252, 0.08), transparent 30%),
                    radial-gradient(circle at 90% 10%, rgba(100, 180, 255, 0.06), transparent 28%),
                    var(--bg);

            color: var(--text);

            font-family:
                    Inter,
                    -apple-system,
                    BlinkMacSystemFont,
                    "Segoe UI",
                    sans-serif;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 1000;

            background: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);

            border-bottom: 1px solid var(--border);
        }

        .navbar {
            min-height: 72px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            text-decoration: none;
            color: var(--text);

            font-size: 1rem;
            font-weight: 750;
            letter-spacing: -0.03em;
        }

        .brand:hover {
            color: var(--text);
        }

        .brand-mark {
            width: 34px;
            height: 34px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background: linear-gradient(
                    135deg,
                    #6957f5 0%,
                    #8478ff 100%
            );

            color: #fff;
            font-size: 0.9rem;
            font-weight: 800;

            box-shadow:
                    0 8px 24px rgba(109, 93, 252, 0.26);
        }

        .navbar-nav {
            gap: 4px;
        }

        .nav-link {
            padding: 9px 13px !important;

            border-radius: 10px;

            color: var(--muted);
            font-size: 0.94rem;
            font-weight: 520;

            transition:
                    background-color 0.18s ease,
                    color 0.18s ease;
        }

        .nav-link:hover {
            color: var(--text);
            background: rgba(20, 24, 32, 0.045);
        }

        .nav-link.active {
            color: var(--accent);
            background: var(--accent-soft);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .login-link {
            display: inline-flex;
            align-items: center;

            padding: 10px 13px;

            border-radius: 11px;

            text-decoration: none;
            color: var(--text);

            font-size: 0.94rem;
            font-weight: 560;

            transition: background-color 0.18s ease;
        }

        .login-link:hover {
            color: var(--text);
            background: rgba(20, 24, 32, 0.045);
        }

        .register-link {
            display: inline-flex;
            align-items: center;

            padding: 10px 16px;

            border-radius: 12px;

            background: #18181b;
            color: #fff;

            text-decoration: none;
            font-size: 0.94rem;
            font-weight: 650;

            box-shadow:
                    0 8px 22px rgba(20, 24, 32, 0.14);

            transition:
                    transform 0.18s ease,
                    background-color 0.18s ease;
        }

        .register-link:hover {
            color: #fff;
            background: #000;
            transform: translateY(-1px);
        }

        .navbar-toggler {
            border: 1px solid var(--border);
            border-radius: 11px;

            box-shadow: none !important;
        }

        .site-main {
            flex: 1;
            width: 100%;
            padding-top: 48px;
            padding-bottom: 64px;
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                padding-top: 14px;
                padding-bottom: 12px;
            }

            .navbar-nav {
                gap: 5px;
            }

            .header-actions {
                margin-top: 12px;
                justify-content: flex-start;
            }
        }
    </style>
</head>

<body>

<header class="site-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a href="/index.php" class="brand">
                <span class="brand-mark">T</span>
                <span>Torrent</span>
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

                <ul class="navbar-nav ms-lg-4 me-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="/index.php">
                            <?= $lang ['home'] ?>
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

                <?php if (isset($_SESSION['user'])): ?>

                    <div class="header-actions">

                        <a href="/userdetails.php" class="login-link">
                                Мой профиль
                        </a>


                    </div>

                    <div class="header-actions">

                        <strong><?= htmlspecialchars($_SESSION['user']) ?></strong>
                        <a href="/logout.php" class="nav-link">
                            Выйти
                        </a>


                    </div>

                <?php else: ?>

                    <div class="header-actions">

                        <a href="/login.php" class="login-link">
                            Войти
                        </a>

                        <a href="/register.php" class="register-link">
                            Регистрация
                        </a>

                    </div>

                <?php endif; ?>






            </div>

        </div>
    </nav>
</header>

<main class="site-main">
    <div class="container">