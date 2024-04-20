<?php
session_start();
$db = new SQLite3('messenger.db');
$user_id = $_SESSION['user_id'];  // ИД текущего пользователя

$query = "SELECT m.id, m.sender_id, m.receiver_id, m.message, m.send_time, u.username as sender_name
          FROM messages m
          JOIN users u ON m.sender_id = u.id
          WHERE m.sender_id = '$user_id' OR m.receiver_id = '$user_id'
          ORDER BY m.send_time DESC";
$result = $db->query($query);

$messages = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $messages[] = $row;
}

echo json_encode($messages);
$db->close();
?>
