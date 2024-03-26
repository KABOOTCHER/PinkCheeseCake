<?php
    $name = $_POST['name'];

    $email = $_POST['email'];


	$to = "bebekin.work@yandex.ru";
	$date = date ("d.m.Y"); 
	$time = date ("h:i");
	$from = $email;
	$subject = "Заявка c сайта";

	
	$msg="
    Имя: $name /n
    Почта: $email"; 	
	mail($to, $subject, $msg, "From: $from ");

?>

