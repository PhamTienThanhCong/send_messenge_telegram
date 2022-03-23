<?php
if (isset($_POST['id_bot']) && isset($_POST['id_user']) && isset($_POST['message'])){
    $id_bot = $_POST['id_bot'];
    $id_user = $_POST['id_user'];
    $mess = $_POST['message'];
    $apiToken = $id_bot;
    $data = [
        'chat_id' => "$id_user",
        'text' => "$mess"
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
    die("Thành Công");
}
die("Thất Bại");
