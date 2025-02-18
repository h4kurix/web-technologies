<?php

$im = imagecreatefrompng("samples/cat.png");

// применяем фильтр grayscale
imagefilter($im, IMG_FILTER_GRAYSCALE);

// устанавливаем тип содержимого
header('Content-Type: image/jpeg');

// вывод изображения в файл
imagepng($im, 'gray-cat.png');

// вывод изображения в браузере
//imagejpeg($im);

// очистка памяти
imagedestroy($im);

?>
