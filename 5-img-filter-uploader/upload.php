<?php
session_start();

// Обработка выхода из системы
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
    exit;
}


$uploadDir = 'dir_upload/';
$error = '';
$uploadedFile = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    if ($file['error'] === UPLOAD_ERR_OK) {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);
        if (in_array($mime, ['image/jpeg', 'image/png', 'image/gif'])) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $ext;
            if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
                $_SESSION['uploaded_file'] = $filename;
                $uploadedFile = $filename;
            } else {
                $error = 'Ошибка загрузки файла';
            }
        } else {
            $error = 'Недопустимый формат файла';
        }
    } else {
        $error = 'Ошибка при загрузке файла';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Upload</title>
    <style>
        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 1px 10px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <a href="upload.php?action=logout" class="logout-btn">Выход</a>

    <?php if ($error): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <input type="submit" value="Загрузить">
    </form>

    <?php if ($uploadedFile): ?>
        <h2>Загруженное изображение:</h2>
        <img src="<?= $uploadDir . $uploadedFile ?>" style="max-width: 600px;">

        <h3>Фильтры:</h3>
        <ul>
            <li><a href="filter.php?type=1">Черно-белый</a></li>
            <li><a href="filter.php?type=2">Сепия</a></li>
            <li><a href="filter.php?type=3">Инверсия цветов</a></li>
        </ul>
    <?php endif; ?>
</body>

</html>