<?php

// Токен вашего бота
const TOKEN = '6927799024:AAEwMa2NNEzTlmMF2yqW3rlNY0-XgvmxPBA';

// ID чата, куда нужно отправить сообщение
const CHATID = '-4001898258';

// Проверка типа запроса
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405); // Method Not Allowed
    exit(json_encode(['error' => 'Method not allowed']));
}

// Проверяем, есть ли имя и почта
if (!isset($_POST['name'], $_POST['email'])) {
    http_response_code(400); // Bad Request
    exit(json_encode(['error' => 'Missing name or email']));
}

$name = $_POST['name'];
$email = $_POST['email'];

// Отправляем текстовое сообщение в телеграм
$txt = "Имя: $name\n";
$txt .= "Почта: $email\n";
$textSendStatus = file_get_contents('https://api.telegram.org/bot' . TOKEN . '/sendMessage?chat_id=' . CHATID . '&text=' . urlencode($txt));

// Проверка успешности отправки сообщения в телеграм
if (!json_decode($textSendStatus)->ok) {
    http_response_code(500); // Internal Server Error
    exit(json_encode(['error' => 'Failed to send message to Telegram']));
}

// Возвращаем успешный ответ
header('Content-Type: application/json');
echo json_encode(['success' => true]);
exit;

?>
