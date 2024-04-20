function fetchMessages() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_messages.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var messages = JSON.parse(xhr.responseText);
            var messageBox = document.getElementById('messageBox');
            messageBox.innerHTML = ''; // Очищаем текущие сообщения
            messages.forEach(function(message) {
                var msg = document.createElement('div');
                msg.textContent = message.sender_name + ': ' + message.message;
                messageBox.appendChild(msg);
            });
        }
    }
    xhr.send();
}

setInterval(fetchMessages, 5000);  // Обновлять сообщения каждые 5 секунд
