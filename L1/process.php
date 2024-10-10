<?php
// Перевіряємо, чи були дані передані через POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримуємо значення з форми
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);

    // Перевіряємо, чи обидва поля заповнені
    if (!empty($first_name) && !empty($last_name)) { 
        if (is_string($first_name) && is_string($last_name)) {
            // Виводимо  введені данні користувача
            echo "Данні отримано: " . htmlspecialchars($first_name) . " " . htmlspecialchars($last_name);
        } else {
            echo "Некоректні дані. Будь ласка, введіть правильні значення.";
        }
    } else {
        echo "Будь ласка, заповніть усі поля.";
    }
} else {
    echo "Дані не були надіслані.";
}
?>
