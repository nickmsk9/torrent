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


if (!isset($_SESSION['user'])) {
    redirect('login.php');
}

// обработка отправки формы

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $description = $_POST['profile_description'];
    $gender = $_POST['gender'];

}



// обработка отправки формы!


//    если пользователь не авторизован — отправляем на login.php

$stmt=$db->prepare("SELECT * FROM users WHERE email=:email");
$stmt->execute(['email'=>$_SESSION['user']]);
$user=$stmt->fetch(PDO::FETCH_ASSOC);
//dump ($user);

require_once __DIR__ . '/templates/header.php';

?>

    <div class="container py-4">

        <div class="row">

            <!-- Левое меню -->

            <div class="col-lg-3">

                <div class="card">

                    <div class="nav flex-column">

                        <a
                            href="<?= $baseUrl ?>/settings.php"
                            class="nav-link fw-bold"
                        >
                            Общие
                        </a>

                        <a
                            href="<?= $baseUrl ?>/change-password.php"
                            class="nav-link"
                        >
                            Сменить пароль
                        </a>

                    </div>

                </div>

            </div>


            <!-- Настройки профиля -->

            <div class="col-lg-9">

                <div class="card">

                    <div class="card-body">

                        <h1>
                            Настройки профиля
                        </h1>

                        <form
                            method="post"
                            enctype="multipart/form-data"
                        >

                            <!-- Верхняя часть -->

                            <div class="row mb-5">

                                <!-- Аватар -->

                                <div class="col-md-4">

                                    <label class="form-label">
                                        Аватар
                                    </label>

                                    <div class="d-flex align-items-start gap-2">

                                        <img
                                            src="<?= $baseUrl ?>/uploads/default/default.jpeg"
                                            alt="Аватар"
                                            width="100"
                                            height="100"
                                            class="avatar"
                                        >

                                        <div>

                                            <input
                                                type="file"
                                                name="avatar"
                                                id="avatar"
                                                hidden
                                            >

                                            <label
                                                for="avatar"
                                                class="btn btn-primary"
                                            >
                                                Загрузить аватар
                                            </label>

                                        </div>

                                    </div>

                                </div>


                                <!-- Дата рождения и пол -->

                                <div class="col-md-8">

                                    <div class="mb-4">

                                        <label class="form-label">
                                            Дата рождения
                                        </label>

                                        <div class="d-flex gap-1">

                                            <select
                                                name="birth_day"
                                                class="form-select"
                                            >
                                                <option value="">День</option>

                                                <?php for ($day = 1; $day <= 31; $day++): ?>

                                                    <option value="<?= $day ?>">
                                                        <?= $day ?>
                                                    </option>

                                                <?php endfor; ?>

                                            </select>


                                            <select
                                                name="birth_month"
                                                class="form-select"
                                            >
                                                <option value="">Месяц</option>
                                                <option value="1">Январь</option>
                                                <option value="2">Февраль</option>
                                                <option value="3">Март</option>
                                                <option value="4">Апрель</option>
                                                <option value="5">Май</option>
                                                <option value="6">Июнь</option>
                                                <option value="7">Июль</option>
                                                <option value="8">Август</option>
                                                <option value="9">Сентябрь</option>
                                                <option value="10">Октябрь</option>
                                                <option value="11">Ноябрь</option>
                                                <option value="12">Декабрь</option>
                                            </select>


                                            <select
                                                name="birth_year"
                                                class="form-select"
                                            >
                                                <option value="">Год</option>

                                                <?php for ($year = date('Y'); $year >= 1940; $year--): ?>

                                                    <option value="<?= $year ?>">
                                                        <?= $year ?>
                                                    </option>

                                                <?php endfor; ?>

                                            </select>

                                        </div>

                                    </div>


                                    <!-- Пол -->

                                    <div>

                                        <label class="form-label">
                                            Пол
                                        </label>

                                        <div class="mb-2">

                                            <label>

                                                <input
                                                    type="radio"
                                                    name="gender"
                                                    value="male"
                                                >

                                                Мужской

                                            </label>

                                        </div>

                                        <div>

                                            <label>

                                                <input
                                                    type="radio"
                                                    name="gender"
                                                    value="female"
                                                >

                                                Женский

                                            </label>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <!-- О себе -->

                            <div class="mb-5">

                                <label
                                    for="profile_description"
                                    class="form-label"
                                >
                                    О себе
                                </label>

                                <textarea
                                    name="profile_description"
                                    id="profile_description"
                                    class="form-control"
                                    rows="7"
                                    placeholder="Расскажите немного о себе"
                                ></textarea>

                            </div>


                            <hr>


                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Сохранить
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



<?php require_once __DIR__ . '/templates/footer.php'; ?>