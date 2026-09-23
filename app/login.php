<?php
require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


$data = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
];

if (login($data)) {
    $_SESSION['user'] = $data['email'];
    $remember = isset($_POST['remember']);
    if ($remember) {
        setcookie('remember_user', $data['email'], time() + 3600);
    }
    redirect('index.php');
} else {
    echo "Неверный email или пароль";
    }
}

















require_once __DIR__ . '/templates/header.php';

?>


    <div class="container py-4">

        <div class="row justify-content-center">

            <div class="col-md-7 col-lg-5">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4 p-md-5">

                        <div class="mb-4">

                            <h1 class="h3 fw-bold mb-2">
                                Вход
                            </h1>

                            <p class="text-secondary mb-0">
                                Введите ваши данные для входа на ресурс
                            </p>

                        </div>

                        <form method="post">

                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Email
                                </label>

                                <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="name@example.com"
                                >

                            </div>

                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Пароль
                                </label>

                                <input
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="Введите пароль"
                                >

                            </div>

                            <div class="form-check mb-4">

                                <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="remember"
                                        id="remember"
                                >

                                <label
                                        class="form-check-label"
                                        for="remember"
                                >
                                    Запомнить меня
                                </label>

                            </div>

                            <button
                                    type="submit"
                                    class="btn btn-dark w-100"
                            >
                                Войти
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

<?php

require_once __DIR__ . '/templates/footer.php';

?>