<?php
$name = $_POST['name'];
$email = $_POST['email'];

$to = "work.bebekin@yandex.ru"; // Ваш адрес электронной почты
$subject = "Новая заявка с сайта";
$message = "Имя: $name\nEmail: $email";

$headers = "From: $email"; // Ваш адрес электронной почты

// Отправляем письмо
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully";
} else {
    echo "Error sending email";
}
?>
