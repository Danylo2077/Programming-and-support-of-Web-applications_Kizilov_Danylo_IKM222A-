<?php
$logText = $_POST['logText'];

// Запис у файл
file_put_contents('log.txt', $logText . PHP_EOL, FILE_APPEND);

// Читання з файлу
$logData = file_get_contents('log.txt');
echo "<h1>Дані з log.txt</h1>";
echo nl2br(htmlspecialchars($logData)); // Перетворення нових рядків у HTML
?>
