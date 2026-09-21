<?php

require_once __DIR__ . '/incs/db.php';

session_start();


// Получаем последнюю новость

$stmt = $db->prepare("
    SELECT id, title, body, created_at
    FROM news
    ORDER BY created_at DESC
    LIMIT 1
");

$stmt->execute();

$news = $stmt->fetchAll(PDO::FETCH_ASSOC);


require_once __DIR__ . '/templates/header.php';

?>


<div class="container py-4">

    <div class="card">

        <div class="card-header">
            Новости
        </div>

        <div class="list-group">

            <?php foreach ($news as $item): ?>

                <div class="list-group-item">

                    <div class="mb-1">
                        <a href="news.php?id=<?= $item['id'] ?>">
                            <?= htmlspecialchars($item['title']) ?>
                        </a>
                    </div>

                    <div class="small text-secondary mb-2">
                        <?= htmlspecialchars($item['created_at']) ?>
                    </div>

                    <div>
                        <?= htmlspecialchars($item['body']) ?>
                    </div>

                </div>

            <?php endforeach; ?>

            <div class="list-group-item text-end">

                <a href="news.php">
                    Все новости
                </a>

            </div>

        </div>

    </div>

</div>


<?php require_once __DIR__ . '/templates/footer.php'; ?>