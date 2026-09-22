<?php

require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';
require_once __DIR__ . '/incs/roles.php';

session_start();

$staff = getStaff();

require_once __DIR__ . '/templates/header.php';

?>


<div class="container py-4">

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4 p-md-5">


            <!-- Заголовок -->
            <div class="mb-5">

                <h1 class="fw-bold mb-3">
                    Администрация
                </h1>

                <p class="text-secondary mb-0">
                    Команда сайта Torrent.
                </p>

            </div>


            <!-- Список администрации -->
            <div class="row g-4">

                <?php foreach ($staff as $st): ?>

                    <div class="col-lg-6">


                        <div class="border rounded p-4 h-100">

                            <div class="d-flex align-items-center gap-3">


                                <!-- Аватар -->
                                <img
                                    src="uploads/default/default.jpeg"
                                    alt="Аватар"
                                    width="80"
                                    height="80"
                                    class="rounded object-fit-cover"
                                >


                                <!-- Информация -->
                                <div class="flex-grow-1">

                                    <h5 class="fw-bold mb-1">

                                        <a
                                            href="userdetails.php?id=<?= $st['id'] ?>"
                                            class="text-dark text-decoration-none"
                                        >
                                            <?= htmlspecialchars($st['name']) ?>
                                        </a>

                                    </h5>


                                    <div class="mb-2">

                                        <span class="badge bg-danger">

                                            <?= htmlspecialchars(
                                                $roles[$st['role']] ?? 'Администратор'
                                            ) ?>

                                        </span>

                                    </div>


                                    <div class="text-secondary small">

                                        На сайте с

                                        <?= htmlspecialchars($st['created_at']) ?>

                                    </div>

                                </div>


                            </div>


                            <hr class="my-3">


                            <a
                                href="userdetails.php?id=<?= $st['id'] ?>"
                                class="btn btn-outline-dark btn-sm"
                            >
                                Открыть профиль
                            </a>


                        </div>

                    </div>

                <?php endforeach; ?>

            </div>


        </div>

    </div>

</div>


<?php require_once __DIR__ . '/templates/footer.php'; ?>