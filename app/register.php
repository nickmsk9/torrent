<?php

require_once __DIR__ . '/incs/db.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") { // В Пост обязателен метод сервер

$name = $_POST['name']; // инициализация переменной методом post
$email = $_POST['email']; // инициализация переменной методом post
$password = $_POST['password']; // инициализация переменной методом post

//добавление нового пользователя в базу для формы
    $stmt = $db->prepare(" 
            INSERT INTO users (name, email, password)
            VALUES (?,?,?)
    ");

    if ($stmt->execute([$name, $email, $password]))

        echo "Пользователь добавлен";

}
//добавление нового пользователя в базу для формы


require_once __DIR__ . '/templates/header.php';
?>

<form method="post">

    Имя:
    <input type="text" name="name">

    Email:
    <input type="email" name="email">

    Пароль:
    <input type="password" name="password">

    <input type="submit" value="Зарегистрироваться">

</form>

<?php

require_once __DIR__ . '/templates/footer.php';

?>