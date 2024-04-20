<?php

// Имя файла базы данных SQLite
$db_file = 'messenger.db';

// Открываем базу данных SQLite, если файла нет, он будет создан
$db = new SQLite3($db_file);

// SQL запрос для создания таблицы пользователей
$createUsers = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    reg_date DATETIME DEFAULT CURRENT_TIMESTAMP
)";

// Выполнение запроса для создания таблицы пользователей
$db->exec($createUsers);

// SQL запрос для создания таблицы сообщений
$createMessages = "CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    sender_id INTEGER NOT NULL,
    receiver_id INTEGER NOT NULL,
    message TEXT NOT NULL,
    send_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(sender_id) REFERENCES users(id),
    FOREIGN KEY(receiver_id) REFERENCES users(id)
)";

// Выполнение запроса для создания таблицы сообщений
$db->exec($createMessages);

// Закрываем соединение с базой данных
$db->close();

// Вывод сообщения об успешном создании базы данных и таблиц
echo "База данных и таблицы успешно созданы!";

?>
