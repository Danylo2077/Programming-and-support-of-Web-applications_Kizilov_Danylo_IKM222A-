<?php
if (isset($_POST['name'])) {
    // Збереження імені користувача в cookie на 7 днів
    setcookie('username', $_POST['name'], time() + (7 * 24 * 60 * 60));
    header("Location: cookie_example.php");
    exit();
}

if (isset($_POST['delete_cookie'])) {
    // Видалення cookie
    setcookie('username', '', time() - 3600);
    header("Location: cookie_example.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>L3__1</title>
</head>
<body>
    <?php if (isset($_COOKIE['username'])): ?>
        <h1>Ваше ім'я: <?php echo htmlspecialchars($_COOKIE['username']); ?></h1>
        <form method="post">
            <button type="submit" name="delete_cookie">Видалити Cookie</button>
        </form>
    <?php else: ?>
        <form method="post">
            <label for="name">Ваше ім'я:</label>
            <input type="text" id="name" name="name" required>
            <button type="submit">Відправити</button>
        </form>
    <?php endif; ?>
</body>
</html>
