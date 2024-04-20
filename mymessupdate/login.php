<?php
session_start();
$db = new SQLite3('messenger.db');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $db->escapeString($_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT username, password FROM users WHERE email = '$email'";
    $result = $db->querySingle($query, true);

    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['user_username'] = $result['username'];
        header('Location: messenger.php'); // Перенаправляем в мессенджер
        exit();
    } else {
        echo "Неверный email или пароль";
    }

    $db->close();
}
?>
