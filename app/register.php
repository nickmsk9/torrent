<?php

require_once __DIR__ . '/incs/db.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") { // В Пост обязателен метод сервер

$name = $_POST['name']; // инициализация переменной методом post
$email = $_POST['email']; // инициализация переменной методом post
$password = $_POST['password']; // инициализация переменной методом post

//добавление нового пользователя в базу для формы
    $stmt = $db->prepare(" 
            INSERT INTO users (name, email, password)
            VALUES (?,?,?)
    ");

    if ($stmt->execute([$name, $email, $password]))

        echo "Пользователь добавлен";

}
//добавление нового пользователя в базу для формы


require_once __DIR__ . '/templates/header.php';
?>

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

<?php

require_once __DIR__ . '/templates/footer.php';

?>