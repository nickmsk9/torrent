<?php

require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stmt = $db->prepare("
        SELECT *
        FROM users
        WHERE email = :email
    ");

    $stmt->execute([
        'email' => $_SESSION['user']
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    $stmt = $db->prepare("
        INSERT INTO torrents (user_id, title, description)
        VALUES (:user_id, :title, :description)
    ");

    $stmt->execute([
        'user_id' => $user['id'],
        'title' => $_POST['title'],
        'description' => $_POST['description']
    ]);
}


require_once __DIR__ . '/templates/header.php';

?>


<div class="container py-4">

    <div class="row justify-content-center">

        <div class="col-lg-9">


            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-md-5">


                    <!-- Заголовок -->
                    <div class="mb-5">

                        <h1 class="fw-bold mb-3">
                            Новая раздача
                        </h1>

                        <p class="text-secondary mb-0">
                            Добавьте название и описание новой раздачи.
                        </p>

                    </div>


                    <!-- Форма -->
                    <form method="post">


                        <!-- Название -->
                        <div class="mb-4">

                            <label
                                for="title"
                                class="form-label fw-semibold"
                            >
                                Название
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-control"
                                placeholder="Введите название раздачи"
                                required
                            >

                        </div>


                        <!-- Описание -->
                        <div class="mb-4">

                            <label
                                for="description"
                                class="form-label fw-semibold"
                            >
                                Описание
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                class="form-control"
                                rows="8"
                                placeholder="Расскажите подробнее о раздаче"
                                required
                            ></textarea>

                        </div>


                        <hr class="my-4">


                        <!-- Кнопки -->
                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-dark"
                            >
                                Добавить раздачу
                            </button>

                            <a
                                href="index.php"
                                class="btn btn-outline-secondary"
                            >
                                Отмена
                            </a>

                        </div>


                    </form>


                </div>

            </div>


        </div>

    </div>

</div>


<?php require_once __DIR__ . '/templates/footer.php'; ?>