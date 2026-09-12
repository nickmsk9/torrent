<?php

require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");

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

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">

            <h1 class="h3 fw-bold mb-2">
                Новая раздача
            </h1>

            <p class="text-secondary mb-4">
                Добавьте название и описание раздачи
            </p>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">
                                Название
                            </label>

                            <input
                                type="text"
                                name="title"
                                class="form-control form-control-lg"
                                placeholder="Введите название раздачи"
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                Описание
                            </label>

                            <textarea
                                name="description"
                                class="form-control"
                                rows="6"
                                placeholder="Введите описание"
                            ></textarea>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Добавить раздачу
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

<?php

require_once __DIR__ . '/templates/footer.php';

?>