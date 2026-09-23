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

function getUsers () : array
{
    global $db;
    $stmt = $db->prepare("SELECT id, name, email, created_at FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

// просто симпатичный вывод для функции
function dump($data)
{
    echo "<pre>";
    print_r($data);
    echo "<pre>";
}

// просто симпатичный вывод для функции


function getUserById ($id)
{
    global $db;
    $stmt = $db->prepare("SELECT id, name, email, created_at FROM users WHERE id = :id");
    $stmt->execute([
        'id' => $id
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

return $user;
}

function getUserByEmail($email)
{
    global $db;

    $stmt = $db->prepare("
        SELECT *
        FROM users
        WHERE email = :email
    ");

    $stmt->execute([
        'email' => $email
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;
}


function getStaff()
{
    global $db;

    $stmt = $db->prepare("
        SELECT id, name, email, role, created_at
        FROM users
        WHERE role = 3
    ");

    $stmt->execute();

    $staff = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $staff;
}




















