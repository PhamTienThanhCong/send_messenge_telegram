# send messenge telegram
Gửi tin nhắn bằng telegram

- link demo: https://phamtienthanhcong.github.io/send_messenge_telegram/
- Link api Post: https://telegramsendmessenge.000webhostapp.com/
- method là post

| id_bot | id_user | message |
| :---: | :---: | :---: |
| id bot | id chat | tin nhắn |

## code 
```
<?php
    $id_bot   = <id bot>;
    $id_user  = <id chat>;
    $mess     = Tin nhắn;
    $apiToken = $id_bot;
    $data = [
        'chat_id' => "$id_user",
        'text' => "$mess"
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
?>
```
