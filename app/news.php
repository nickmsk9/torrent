<?php

require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';

session_start();

$user = null;

if (isset($_SESSION['user'])) {
    $user = getUserByEmail($_SESSION['user']);
}


// Добавление новости

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $user && $user['role'] == 3) {

    $title = $_POST['title'];
    $body = $_POST['body'];

    $stmt = $db->prepare("
        INSERT INTO news (title, body)
        VALUES (:title, :body)
    ");

    $stmt->execute([
        'title' => $title,
        'body' => $body,
    ]);

    redirect('news.php');
}


// Вывод новостей

$stmt = $db->prepare("
    SELECT id, title, body, created_at
    FROM news
    ORDER BY created_at DESC
");

$stmt->execute();

$news = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Шапка

require_once __DIR__ . '/templates/header.php';

?>


<div class="container py-4">

<?php if ($user['role'] == 3): ?>

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header">
            <h5 class="mb-0">
                Добавить новость
            </h5>
        </div>

        <div class="card-body">

            <form method="post">

                <div class="mb-3">

                    <label for="title" class="form-label">
                        Заголовок новости
                    </label>

                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control"
                        placeholder="Введите заголовок"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label for="body" class="form-label">
                        Текст новости
                    </label>

                    <textarea
                        name="body"
                        id="body"
                        class="form-control"
                        rows="10"
                        placeholder="Введите текст новости"
                        required
                    ></textarea>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Добавить новость
                </button>

            </form>

        </div>

    </div>

    <?php endif; ?>


    <?php foreach ($news as $item): ?>

        <div class="card border-0 shadow-sm mb-3">

            <div class="card-body">

                <h4 class="mb-2">
                    <?= htmlspecialchars($item['title']) ?>
                </h4>

                <p class="mb-2">
                    <?= htmlspecialchars($item['body']) ?>
                </p>

                <small class="text-secondary">
                    <?= htmlspecialchars($item['created_at']) ?>
                </small>

            </div>

        </div>

    <?php endforeach; ?>

</div>


<?php require_once __DIR__ . '/templates/footer.php'; ?>