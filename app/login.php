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



<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">

        <h1 class="h3 fw-bold mb-2">Форма входа</h1>
        <p class="text-secondary mb-4">
Введите Ваши данные для входа на ресурс        </p>

        <form method="post">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control form-control-lg"
                    placeholder="name@example.com"
                >
            </div>

            <div class="mb-4">
                <label class="form-label">Пароль</label>
                <input
                    type="password"
                    name="password"
                    class="form-control form-control-lg"
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

                <label class="form-check-label" for="remember">
                    Запомнить меня
                </label>
            </div>

            <button
                type="submit"
                class="btn btn-dark btn-lg w-100"
            >
                Войти
            </button>

        </form>


    </div>
</div>

<?php

require_once __DIR__ . '/templates/footer.php';

?>