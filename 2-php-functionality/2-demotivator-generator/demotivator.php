<?php

// тип содержимого - png
header('Content-Type: image/png');

// открытие файла с картинкой и связываем его с идентификатором $im
$im = imagecreatefrompng("./samples/image.png");

// создание цвета текста (белый)
$text_color = imagecolorallocate($im, 255, 255, 255);

// путь к шрифту
imagettftext($im, 36, 0, 65, 380, $text_color, './samples/arial.ttf', "ЕГЭ ПО РИСОВАНИЮ");

// вывод изображения в файл
imagepng($im, 'demotivator.png');

// вывод изображения в браузере
imagejpeg($im);

// освобождение памяти
imagedestroy($im);
?>