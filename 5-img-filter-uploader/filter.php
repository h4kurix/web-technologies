<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] || !isset($_SESSION['uploaded_file'])) {
    header('Location: login.php');
    exit;
}

$type = $_GET['type'] ?? 0;
if (!in_array($type, ['1', '2', '3'])) {
    die('Неверный фильтр');
}

$source = 'dir_upload/' . $_SESSION['uploaded_file'];
$dest = 'dir_filtered/filter_' . $type . '.jpg';

// Загрузка изображения
$image = null;
switch (mime_content_type($source)) {
    case 'image/jpeg':
        $image = imagecreatefromjpeg($source);
        break;
    case 'image/png':
        $image = imagecreatefrompng($source);
        break;
    case 'image/gif':
        $image = imagecreatefromgif($source);
        break;
    default:
        die('Неподдерживаемый формат');
}

// Применение фильтра
switch ($type) {
    case '1':
        imagefilter($image, IMG_FILTER_GRAYSCALE);
        break;
    case '2':
        imagefilter($image, IMG_FILTER_GRAYSCALE);
        imagefilter($image, IMG_FILTER_COLORIZE, 90, 60, 40);
        break;
    case '3':
        imagefilter($image, IMG_FILTER_NEGATE);
        break;
}

// Сохранение и вывод
imagejpeg($image, $dest, 90);
imagedestroy($image);

header('Content-Type: image/jpeg');
readfile($dest);
exit;
?>