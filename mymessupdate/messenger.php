<?php
session_start();
if (!isset($_SESSION['user_username'])) {
    header('Location: login.html'); // Если не залогинены, возвращаем на страницу входа
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мессенджер</title>
</head>
<body>
    <h2>Мессенджер</h2>
    <form action="send_message.php" method="post">
        Сообщение: <textarea name="message" required></textarea><br>
        <input type="hidden" name="username" value="<?php echo htmlspecialchars($_SESSION['user_username']); ?>">
        <button type="submit">Отправить</button>
    </form>
    <h3>Сообщения:</h3>
    <div>
        <?php
        if (file_exists("messages.txt")) {
            $messages = file_get_contents("messages.txt");
            echo nl2br(htmlspecialchars($messages));
        } else {
            echo "Нет сообщений.";
        }
        ?>
    </div>
</body>
</html>
