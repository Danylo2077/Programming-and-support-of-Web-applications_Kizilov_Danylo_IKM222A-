<?php
session_start();
$conn = new mysqli('db', 'root', 'newpassword', 'users_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Хешування пароля

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    $stmt->close();

    header("Location: login.php"); // Перенаправлення на сторінку авторизації
    exit;
}
?>

<form method="post">
    Username: <input type="text" name="username" required>
    Email: <input type="email" name="email" required>
    Password: <input type="password" name="password" required>
    <input type="submit" value="Register">
</form>
