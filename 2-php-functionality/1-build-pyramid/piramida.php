<?php
$im = imagecreatetruecolor(400, 400);

$blue = imagecolorallocate($im, 0, 0, 255);
$red = imagecolorallocate($im, 255, 0, 0);
$green = imagecolorallocate($im, 0, 255, 0);

//залитый прямоугольник
imagefilledrectangle($im, 150, 250, 250, 350, $blue);

//залитый круг
imagefilledellipse($im, 200, 200, 100, 100, $red);

// массив точек для треугольника
$values = array(
    200,
    50,   // Point 1 (x, y)
    150,
    150,  // Point 2 (x, y)
    250,
    150   // Point 3 (x, y)
);

// рисование треугольника
imagefilledpolygon($im, $values, 3, $green);

// прорисовка
header("Content-type: image/png");

// вывод изображения в файл
imagepng($im, 'pyramid.png');

// вывод изображения в браузере
imagepng($im);

// освобождение памяти
imagedestroy($im);
?>