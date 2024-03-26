<?php
$name = $_POST['name'];
$email = $_POST['email'];

$to = "bebekin.work@yandex.ru";
$subject = "Заявка c сайта";
$date = date("d.m.Y");
$time = date("h:i");
$from = $email;

$msg = "
Имя: $name \n
Почта: $email";

// Настройки SMTP сервера
$smtpServer = 'smtp.yandex.ru'; // SMTP сервер
$smtpPort = 465; // Порт (обычно 465 для SSL, 587 для TLS)
$smtpUsername = 'bebekin.work'; // Ваше имя пользователя SMTP
$smtpPassword = '4ESc0I3Z'; // Ваш пароль SMTP

// Формирование заголовков письма
$headers = "From: $from\r\n";
$headers .= "Content-type: text/plain; charset=utf-8\r\n";

// Дополнительные параметры для отправки через SMTP
$additional_parameters = "-f $from";

// Настройка параметров для отправки через SMTP
ini_set('SMTP', $smtpServer);
ini_set('smtp_port', $smtpPort);
ini_set('username', $smtpUsername);
ini_set('password', $smtpPassword);

// Отправка письма
if (mail($to, $subject, $msg, $headers, $additional_parameters)) {
    echo "Письмо успешно отправлено";
} else {
    echo "Ошибка при отправке письма";
}
?>
