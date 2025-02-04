<?php
require_once 'simple_start.php';

// Список файлов с заданиями
$taskFiles = [
    'tasks/task1.php',
    'tasks/task2.php',
    'tasks/task3.php',
    'tasks/task4.php',
    'tasks/task5.php',
    'tasks/task6.php',
    'tasks/task7.php',
    'tasks/task8.php',
    'tasks/task9.php',
    'tasks/task10.php',
    'tasks/task11.php',
    'tasks/task12.php',
    'tasks/task13.php',
    'tasks/task14.php',
    'tasks/task15.php',
    'tasks/task16.php'
];


echo "<html><head><title>Сводная таблица</title><style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        td { white-space: pre-wrap; }
      </style></head><body>";

echo "<table>";
echo "<tr><th>№</th><th>Код файла</th><th>Результат</th></tr>";

$index = 1;
foreach ($taskFiles as $file) {
    // Получаем содержимое файла как текст
    $fileContent = htmlspecialchars(file_get_contents(__DIR__ . '/' . $file));

    // Получаем результат выполнения
    ob_start();
    include __DIR__ . '/' . $file;
    $result = ob_get_clean();

    echo "<tr><td>$index</td><td>$fileContent</td><td>$result</td></tr>";
    $index++;
}

echo "</table></body></html>";
?>