<?php

require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/config.php';
require_once __DIR__ . '/incs/functions.php';

session_start();

if (!isset($_SESSION['user'])) {
    redirect("login.php");
}

$stmt = $db->prepare("
    SELECT * FROM users
    WHERE email = :email
");

$stmt->execute([
    'email' => $_SESSION['user']
]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

require_once __DIR__ . '/templates/header.php';

?>

<div class="container py-4">

    <!-- Верхний блок профиля -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <h1 class="h3 mb-1">
                <?= htmlspecialchars($user['name']) ?>
            </h1>

            <div class="text-secondary mb-3">
                На сайте с <?= htmlspecialchars($user['created_at']) ?>
            </div>

        </div>

    </div>


    <!-- Информация о пользователе -->
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0">
                Информация о пользователе
            </h5>
        </div>

        <div class="card-body p-4">

            <div class="row mb-3">

                <div class="col-md-3 text-secondary">
                    Имя
                </div>

                <div class="col-md-9">
                    <?= htmlspecialchars($user['name']) ?>
                </div>

            </div>


            <hr>


            <div class="row mb-3">

                <div class="col-md-3 text-secondary">
                    Email
                </div>

                <div class="col-md-9">
                    <?= htmlspecialchars($user['email']) ?>
                </div>

            </div>


            <hr>


            <div class="row mb-3">

                <div class="col-md-3 text-secondary">
                    Роль
                </div>

               <div class="col-md-9">

    <?php


echo $roles[$user['role']];

?>

</div>

            </div>


            <hr>


            <div class="row">

                <div class="col-md-3 text-secondary">
                    Дата регистрации
                </div>

                <div class="col-md-9">
                    <?= htmlspecialchars($user['created_at']) ?>
                </div>

            </div>

        </div>

    </div>

</div>

<?php

require_once __DIR__ . '/templates/footer.php';

?>