<?php
session_start();

// Ініціалізація корзини
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Додавання товару в корзину
if (isset($_POST['item'])) {
    $_SESSION['cart'][] = $_POST['item'];
    // Збереження попередніх покупок в cookie
    if (isset($_COOKIE['previous_purchases'])) {
        $previous = json_decode($_COOKIE['previous_purchases'], true);
    } else {
        $previous = [];
    }
    $previous[] = $_POST['item'];
    setcookie('previous_purchases', json_encode($previous), time() + (7 * 24 * 60 * 60));
    header("Location: cart_example.php");
    exit();
}

// Очистка корзини
if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
    header("Location: cart_example.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>L3__4</title>
</head>
<body>
    <h1>Корзина</h1>
    <form method="post">
        <label for="item">Додати товар:</label>
        <input type="text" id="item" name="item" required>
        <button type="submit">Додати</button>
    </form>
    <h2>Товари в корзині:</h2>
    <ul>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <li><?php echo htmlspecialchars($item); ?></li>
        <?php endforeach; ?>
    </ul>
    <form method="post">
        <button type="submit" name="clear_cart">Очистити корзину</button>
    </form>

    <h2>Попередні покупки:</h2>
    <ul>
        <?php
        if (isset($_COOKIE['previous_purchases'])) {
            $previous_purchases = json_decode($_COOKIE['previous_purchases'], true);
            foreach ($previous_purchases as $purchase) {
                echo "<li>" . htmlspecialchars($purchase) . "</li>";
            }
        }
        ?>
    </ul>
</body>
</html>
