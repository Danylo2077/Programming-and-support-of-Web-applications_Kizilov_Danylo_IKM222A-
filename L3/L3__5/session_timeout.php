<?php
// Налаштування часу активності сесії (5 хвилин = 300 секунд)
ini_set('session.gc_maxlifetime', 300);
ini_set('session.cookie_lifetime', 0); // Сесія активна тільки протягом сесії браузера

// Старт сесії
session_start();

// Вимкнення кешування сторінок
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Виведення поточного часу сервера для діагностики
echo 'Server time: ' . date('H:i:s') . '<br>';

// Логіка завершення сесії через 5 хвилин неактивності
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    // Якщо більше 5 хвилин неактивний, завершення сесії
    session_unset();
    session_destroy();
    echo "Сесія завершена через неактивність.<br>";
    exit();
} else {
    // Якщо сесія активна, оновлюємо час останньої активності
    $_SESSION['last_activity'] = time();
    echo "Сесія активна.<br>";
}

?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>L3__5</title>
</head>
<body>
    <h1>Сесія активна</h1>
</body>
</html>
