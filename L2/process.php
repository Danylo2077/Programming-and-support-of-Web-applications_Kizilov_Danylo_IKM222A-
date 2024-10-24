<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Перевірка наявності файлу
if (file_exists($target_file)) {
    echo "Файл вже існує. Змініть назву файлу.";
    $uploadOk = 0;
}

// Перевірка типу файлу
if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
    echo "Вибачте, лише файли JPG, JPEG, PNG дозволені.";
    $uploadOk = 0;
}

// Перевірка розміру файлу
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "Вибачте, ваш файл перевищує 2 МБ.";
    $uploadOk = 0;
}

// Перевірка наявності помилок під час завантаження
if ($uploadOk == 0) {
    echo "Ваш файл не був завантажений.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Файл ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " завантажено.<br>";
        echo "Тип: " . $_FILES["fileToUpload"]["type"] . "<br>";
        echo "Розмір: " . ($_FILES["fileToUpload"]["size"] / 1024) . " КБ<br>";
        echo '<a href="' . $target_file . '" download>Завантажити файл</a>';
    } else {
        echo "Виникла помилка при завантаженні файлу.";
    }
}
?>
