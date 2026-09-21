<?php


function roles () {
    if (!isset ($_SESSION['user'])) {
        return 1;
    }
    else  {
        global $db;
        $stmt = $db->prepare ("SELECT role FROM users WHERE email = ?");
        $stmt->execute ([$_SESSION['user']]);
        $role = $stmt->fetch(PDO::FETCH_ASSOC);
        return $role['role'];
    }
}

/*

1, если пользователь не авторизован;
2, если обычный пользователь;
3, если админ.

*/
