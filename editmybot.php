<?php

function getData($type){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://p2p.binance.com/bapi/c2c/v2/friendly/c2c/adv/search',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{"page":1,"rows":20,"payTypes":[],"asset":"USDT","tradeType":"'.$type.'","fiat":"VND","publisherType":null}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Cookie: cid=FBb5Btvt'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $response = json_decode($response);

    $min = 10000000;
    $max = 0;
    $sum = 0;

    foreach ($response->data as $res){
      $sum += $res->adv->price;
      if ($res->adv->price > $max){
        $max = $res->adv->price;
      }
      if ($res->adv->price < $min){
        $min = $res->adv->price;
      }
    }
    $avg = $sum/20;
    return ["min"=>$min,"max"=>$max,"avg"=>$avg];
  }

$input = file_get_contents('php://input');
if ($input){
    $update = json_decode($input);
    $message = $update->message;
}

$chat_id = "group id";
$token = "bot id";

$buy = getData('BUY');
$sell = getData('SELL');
$message = "Buy: ".$buy['max']." | ".$buy['min']." | ".$buy['avg']."\nSell: ".$sell['max']." | ".$sell['min']." | ".$sell['avg'];

$data = [
  'chat_id' => "$chat_id",
  'text' => "$message"
];

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );