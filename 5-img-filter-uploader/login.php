<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    header('Location: upload.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'user' && $password === 'qwerty') {
        $_SESSION['loggedin'] = true;
        header('Location: upload.php');
        exit;
    } else {
        $error = 'Неверный логин или пароль';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <?php if ($error): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Логин: <input type="text" name="username" required></label><br>
        <label>Пароль: <input type="password" name="password" required></label><br>
        <input type="submit" value="Войти">
    </form>
</body>

</html>