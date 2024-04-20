<?php
$db = new SQLite3('messenger.db');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $db->escapeString($_POST['username']);
    $email = $db->escapeString($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($db->exec($query)) {
        echo "Успешно зарегистрировано. Теперь вы можете <a href='login.html'>войти в свой аккаунт</a>.";
    } else {
        echo "Ошибка при регистрации: " . $db->lastErrorMsg();
    }
}
?>
