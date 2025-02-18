<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$upload_dir = __DIR__ . '/uploads/';
$max_file_size = 5 * 1024 * 1024;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0775, true);
    }

    $tmp_name = $_FILES['file']['tmp_name'];
    $name = basename($_FILES['file']['name']);
    $destination = $upload_dir . $name;

    if ($_FILES['file']['size'] > $max_file_size) {
        $error = "Файл слишком большой";
    } elseif (!in_array($_FILES['file']['type'], ['image/jpeg', 'image/png', 'application/pdf'])) {
        $error = "Недопустимый тип файла";
    } else {
        if (move_uploaded_file($tmp_name, $destination)) {
            $success = "Файл загружен";
        } else {
            $error = "Ошибка загрузки";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Загрузка файла</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Загрузка файла</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <input type="submit" value="Загрузить">
    </form>
    
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <?php if (isset($success)) echo "<p style='color: green;'>$success</p>"; ?>
    
    <p><a href="info.php">Вернуться на info.php</a></p>
</body>
</html>
