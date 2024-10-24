<?php
$files = scandir('uploads/');
echo "<h1>Список файлів</h1>";
foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
        echo '<a href="uploads/' . htmlspecialchars($file) . '" download>' . htmlspecialchars($file) . '</a><br>';
    }
}
?>
