<?php
session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
    // Перевірка логіну та паролю
    if ($_POST['login'] == 'user' && $_POST['password'] == 'password') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $_POST['login'];
        header("Location: session_example.php");
        exit();
    } else {
        $error = "Неправильний логін або пароль!";
    }
}

if (isset($_POST['logout'])) {
    // Вихід з сесії
    session_destroy();
    header("Location: session_example.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>L3__2</title>
</head>
<body>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <h1>Привіт, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <form method="post">
            <button type="submit" name="logout">Вийти</button>
        </form>
    <?php else: ?>
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
        <form method="post">
            <label for="login">Логін:</label>
            <input type="text" id="login" name="login" required>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Увійти</button>
        </form>
    <?php endif; ?>
</body>
</html>
