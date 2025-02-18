<?php
session_start();

// Определяем правильные учетные данные
$valid_user = 'user';
$valid_pass = 'qwerty';

// Обработка выхода
if (isset($_POST['logout'])) {
    session_destroy();
    session_start();
}

// Обработка формы входа
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    if ($_POST['username'] === $valid_user && $_POST['password'] === $valid_pass) {
        $_SESSION['user'] = $valid_user;
        header('Location: info.php');
        exit();
    } else {
        $error = 'Неверные логин или пароль';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Вход</title>
    <meta charset="utf-8">
</head>

<body>
    <h2>Вход в систему</h2>
    <form method="post">
        <p>Логин: <input type="text" name="username" required></p>
        <p>Пароль: <input type="password" name="password" required></p>
        <p><input type="submit" value="Войти"></p>
        <?php if (isset($error))
            echo "<p style='color:red;'>" . htmlspecialchars($error) . "</p>"; ?>
    </form>
</body>

</html>