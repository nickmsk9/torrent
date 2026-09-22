<?php

require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';

session_start();

$users = getUsers();

require_once __DIR__ . '/templates/header.php';

?>


<div class="container py-4">

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4 p-md-5">


            <!-- Заголовок -->
            <div class="mb-5">

                <h1 class="fw-bold mb-3">
                    Пользователи
                </h1>

                <p class="text-secondary mb-0">
                    Участники сайта Torrent.
                </p>

            </div>


            <!-- Таблица пользователей -->
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead>

                        <tr>

                            <th class="ps-3">
                                ID
                            </th>

                            <th>
                                Пользователь
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Регистрация
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php foreach ($users as $user): ?>

                            <tr>

                                <td class="ps-3">
                                    <?= $user['id'] ?>
                                </td>


                                <td>

                                    <a
                                        href="userdetails.php?id=<?= $user['id'] ?>"
                                        class="fw-semibold text-dark text-decoration-none"
                                    >
                                        <?= htmlspecialchars($user['name']) ?>
                                    </a>

                                </td>


                                <td class="text-secondary">
                                    <?= htmlspecialchars($user['email']) ?>
                                </td>


                                <td class="text-secondary">
                                    <?= htmlspecialchars($user['created_at']) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>


        </div>

    </div>

</div>


<?php require_once __DIR__ . '/templates/footer.php'; ?>