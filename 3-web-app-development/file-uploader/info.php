<?php
session_start();

// Проверка авторизации
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Информация</title>
    <meta charset="utf-8">
</head>

<body>
    <h2>Системная информация</h2>
    <p>Авторизованный пользователь: <?php echo htmlspecialchars($_SESSION['user']); ?></p>
    <p>Сервер: <?php echo htmlspecialchars($_SERVER['SERVER_NAME']); ?></p>
    <p>Браузер: <?php echo htmlspecialchars($_SERVER['HTTP_USER_AGENT']); ?></p>
    <p>Реферер: <?php echo htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'Нет данных'); ?></p>
    <p>ID сессии: <?php echo session_id(); ?></p>

    <h3>Навигация</h3>
    <p><a href="upload.php">Загрузить файл</a></p>
    <form action="login.php" method="post">
        <input type="hidden" name="logout" value="1">
        <input type="submit" value="Выйти">
    </form>
</body>

</html>