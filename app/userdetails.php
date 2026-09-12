<?php

require_once __DIR__ . '/incs/db.php';
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

    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">

            <h1 class="h3 fw-bold mb-2">
                Профиль
            </h1>

            <p class="text-secondary mb-4">
                Информация о вашем аккаунте
            </p>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <div class="mb-4">
                        <label class="form-label text-secondary">
                            Имя
                        </label>

                        <div class="form-control form-control-lg bg-light">
                            <?= htmlspecialchars($user['name']) ?>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-secondary">
                            Email
                        </label>

                        <div class="form-control form-control-lg bg-light">
                            <?= htmlspecialchars($user['email']) ?>
                        </div>
                    </div>

                    <div class="mb-0">
                        <label class="form-label text-secondary">
                            Дата регистрации
                        </label>

                        <div class="form-control form-control-lg bg-light">
                            <?= htmlspecialchars($user['created_at']) ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

<?php

require_once __DIR__ . '/templates/footer.php';

?>