<?php
session_start();
if (isset($_POST['message'])) {
    $username = $_SESSION['user_username']; // Извлекаем имя пользователя из сессии
    $message = strip_tags($_POST['message']);
    $formattedMessage = $username . ": " . $message . "\n";

    file_put_contents("messages.txt", $formattedMessage, FILE_APPEND);
    header("Location: messenger.php"); // Возвращаем обратно к форме мессенджера
    exit();
}
?>
