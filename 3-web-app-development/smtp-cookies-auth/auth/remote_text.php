<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
    exit();
}

$content = file_get_contents('http://kappa.cs.petrsu.ru/~kulakov/courses/php/fortune.php');
if ($content === false)
    die('Ошибка загрузки');

$dom = new DOMDocument();
@$dom->loadHTML($content);
$preElements = $dom->getElementsByTagName('pre');

if ($preElements->length > 0) {
    $text = $preElements->item(0)->nodeValue;
} else {
    $text = 'Текст не найден';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Текст</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding-top: 50px;
            font-size: calc(14px + 0.5vw);
        }

        .content {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .logout {
            position: fixed;
            top: 10px;
            right: 20px;
            z-index: 1000;
        }

        .logout button {
            padding: 10px 20px;
            background-color: #ff4444;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .logout button:hover {
            background-color: #cc0000;
            transform: translateY(-1px);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="logout">
        <form method="post" action="logout.php">
            <button type="submit">Выйти →</button>
        </form>
    </div>

    <div class="content">
        <?= nl2br(htmlspecialchars($text)) ?>
    </div>
</body>

</html>