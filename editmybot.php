<?php
$input = file_get_contents('php://input');
$update = json_decode($input);
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$token = "5241483111:AAFhTNDJVjJkwstvVWjM1V1CEc2s1jWi5Jk";
file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$text");