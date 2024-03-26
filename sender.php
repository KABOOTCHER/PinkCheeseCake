<?php

// Токен вашего бота
const TOKEN = '6927799024:AAEwMa2NNEzTlmMF2yqW3rlNY0-XgvmxPBA';

// ID чата, куда нужно отправить сообщение
const CHATID = '-4001898258';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Проверяем, есть ли имя и почта
    if (!empty($_POST['name']) && !empty($_POST['email'])) {
        $txt = "Новое сообщение от " . $_POST['name'] . " (" . $_POST['email'] . ")";

        // Отправляем сообщение в телеграм
        $telegramUrl = 'https://api.telegram.org/bot' . TOKEN . '/sendMessage?chat_id=' . CHATID . '&text=' . urlencode($txt);
        $telegramResponse = file_get_contents($telegramUrl);

        // Если сообщение успешно отправлено
        if ($telegramResponse) {
            $response = array('success' => true);
            echo json_encode($response);
        } else {
            $response = array('success' => false);
            echo json_encode($response);
        }
    } else {
        $response = array('success' => false);
        echo json_encode($response);
    }
} else {
    header("Location: /");
}

?>