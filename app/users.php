<?php

require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';

$users = getUsers();

require_once __DIR__ . '/templates/header.php';

?>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Пользователи</h2>
            <div class="text-muted">Участники нашего трекера</div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                   <thead>
<tr>
    <th class="ps-4">ID</th>
    <th>Пользователь</th>
    <th>Email</th>
    <th>Регистрация</th>
</tr>
</thead>

                    <tbody>

                  <?php foreach ($users as $user): ?>

    <tr>
        <td><?= $user['id'] ?></td>

        <td>
            <a href="userdetails.php?id=<?= $user['id'] ?>">
                <?= $user['name'] ?>
            </a>
        </td>

        <td><?= $user['email'] ?></td>
        <td><?= $user['created_at'] ?></td>
    </tr>

<?php endforeach; ?>




                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
