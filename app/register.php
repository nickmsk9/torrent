<?php

require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';

session_start();

if (isset($_SESSION['user'])) {
    echo "Вы уже вошли!";
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // В Пост обязателен метод сервер


        $data = [

                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],

        ];

        if (register($data))
        {
            redirect ("login.php");
        }
        else {
            echo "Такой email уже существует";
        }
    }
}



//добавление нового пользователя в базу для формы


require_once __DIR__ . '/templates/header.php';
?>
<?php if (!isset($_SESSION['user'])): ?>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <h1 class="h3 fw-bold mb-2">Регистрация</h1>
            <p class="text-secondary mb-4">
                Создайте аккаунт в Torrent
            </p>

            <form method="post">

                <div class="mb-3">
                    <label class="form-label">Имя</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control form-control-lg"
                        placeholder="Ваше имя"
                    >
                </div>

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

                <button
                    type="submit"
                    class="btn btn-dark btn-lg w-100"
                >
                    Зарегистрироваться
                </button>

            </form>

            <p class="text-secondary text-center small mt-4 mb-0">
                Уже есть аккаунт?
                <a href="/login.php" class="text-dark fw-semibold">
                    Войти
                </a>
            </p>

        </div>
    </div>

<?php endif; ?>

<?php if (isset($_SESSION['user'])): ?>

    <div class="alert alert-success text-center">
        Вы уже вошли как
        <strong><?= htmlspecialchars($_SESSION['user']) ?></strong>
    </div>

<?php else: ?>

<?php endif; ?>

<?php

require_once __DIR__ . '/templates/footer.php';

?>