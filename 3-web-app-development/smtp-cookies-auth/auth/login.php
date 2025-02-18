<?php
session_start();

if (isset($_SESSION['auth'])) {
    header('Location: remote_text.php');
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if ($user === 'user' && $pass === 'qwerty') {
        $_SESSION['auth'] = true;
        header('Location: remote_text.php');
        exit();
    } else {
        $error = 'Ошибка входа';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Вход</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            padding: 20px;
            border: 1px solid #ccc;
            width: 300px;
            text-align: center;
        }

        input {
            margin: 5px;
            width: 90%;
            padding: 8px;
        }

        button {
            padding: 10px;
            width: 95%;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Вход</h2>
        <?php if ($error)
            echo "<p class='error'>$error</p>"; ?>
        <form method="post">
            <input type="text" name="user" placeholder="Логин" required>
            <input type="password" name="pass" placeholder="Пароль" required>
            <button type="submit">Войти</button>
        </form>
    </div>
</body>

</html>