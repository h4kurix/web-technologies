<?php
$cookie_name = 'visits';
$count = $_COOKIE[$cookie_name] ?? 0;

if ($count == 0) {
    setcookie($cookie_name, 1, time() + 86400 * 30);
    echo "Добро пожаловать!";
} else {
    $count++;
    setcookie($cookie_name, $count, time() + 86400 * 30);
    echo "Вы посетили эту страницу $count раз";
}
?>