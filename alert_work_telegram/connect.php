<?php
    $str = file_get_contents('./config.json');
    $account = json_decode($str, true);
    $connection = mysqli_connect('localhost',"{$account['name']}", "{$account['password']}", "{$account['table']}");
    mysqli_set_charset($connection,'utf8');