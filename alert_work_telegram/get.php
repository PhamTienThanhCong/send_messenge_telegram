<?php
require_once "./connect.php";
if ((isset($_GET['date']) == false)) {
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/get.php";
    echo "Lấy dữ liệu thất bại<br/>";
    echo "Bạn thị thiếu method date<br/>";
    echo "Bạn cần có request: ".$actual_link."?date='day";
    die();
}
$date = $_GET['date'];
$sql = "SELECT * FROM `data_time` WHERE `date` = '$date'";
$data = mysqli_query($connection,$sql);
$data = mysqli_fetch_array($data);
if (isset($data['time'])){
    $time = $data['time'];
}else{
    $time = "không có thông tin";
}
echo json_encode(["time"=>$time]);