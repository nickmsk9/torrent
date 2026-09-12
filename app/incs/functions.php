<?php

// принимает массив данных пользователя и возвращает bool

function register (array $data) : bool
{
    global $db;
    $stmt = $db->prepare("SELECT COUNT(email) FROM users WHERE email = ?");
    $stmt->execute([$data['email']]);
    if ($stmt->fetchColumn()) {
        return false; // если email занят
    }

    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $stmt=$db->prepare("
    INSERT INTO users (name, email, password)
    VALUES (?,?,?)
    ");
    $stmt->execute([$data['name'], $data['email'], $data['password']]);
    return true;
}

//если COUNT(email) вернул число больше 0, значит такой email уже есть, и регистрация прекращается
//получили $db
//→ проверили email
//→ если занят: false
//→ захешировали пароль
//→ INSERT
//→ true
//принимает массив данных пользователя и возвращает bool


//Простая функция редиректа по УРЛ адресу
function redirect (string $url) : never
{
    header("Location: $url");
    exit;
}

//Простая функция редиректа по УРЛ адресу

//Функция Логина

function login (array $data) : bool
{
    global $db;
    $stmt =$db->prepare("
    SELECT email, password FROM users WHERE email = ?");
    $stmt->execute([$data['email']]);
    $user = $stmt->fetch();
    if (!$user) {
        return false;
    }
    if (password_verify($data['password'], $user['password'])) {
        return true;
    } else {
        return false;
    }
}

//Функция Логина


























