function sendMessage() {
    var message = document.getElementById('messageInput').value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "send_message.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            // Обновляем список сообщений здесь, если нужно
        }
    }
    xhr.send("message=" + message);
    document.getElementById('messageInput').value = ''; // Очистить поле после отправки
}
