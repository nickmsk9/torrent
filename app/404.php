<?php

http_response_code(404);

$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

if ($baseUrl === '/' || $baseUrl === '.') {
    $baseUrl = '';
}

?>

<!doctype html>
<html lang="ru">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>404 — Страница не найдена</title>

    <link
        href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
        }

        body {
            min-height: 100vh;

            background: #cccccc;

            font-family: 'Roboto', Arial, sans-serif;

            color: #ffffff;
        }

        .page-error {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            text-align: center;

            padding: 30px 20px;
        }

        .error-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .error-image {
            width: 430px;
            max-width: 85vw;
            height: auto;

            display: block;

            margin-bottom: 10px;
        }

        .error-text {
            font-size: 18px;
            font-weight: 400;

            text-shadow:
                0 1px 1px rgba(0, 0, 0, 0.25);

            margin-top: 5px;
        }

        .error-link {
            display: inline-block;

            margin-top: 16px;

            color: #ffffff;

            font-size: 18px;

            text-decoration: underline;

            text-shadow:
                0 1px 1px rgba(0, 0, 0, 0.25);

            transition: opacity 0.2s ease;
        }

        .error-link:hover {
            opacity: 0.7;
        }

        @media (max-width: 600px) {

            .error-image {
                width: 340px;
            }

            .error-text,
            .error-link {
                font-size: 16px;
            }

        }

    </style>

</head>

<body>

<div class="page-error">

    <div class="error-wrapper">

        <img
            src="<?= $baseUrl ?>/pic/404.png"
            alt="404 — Страница не найдена"
            class="error-image"
        >

        <div class="error-text">
            Ой... страничка потерялась.
        </div>

        <a
            href="<?= $baseUrl ?>/index.php"
            class="error-link"
        >
            Перейти на главную
        </a>

    </div>

</div>

</body>

</html>