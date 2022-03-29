<?php
    require_once "./connect.php";
    if ((isset($_GET['date']) == false) || (isset($_GET['time']) == false)) {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/push.php";
        echo "Tài thông tin thất bại<br/>";
        echo "bạn thiếu method date hoặc time<br/>";
        echo "Bạn cần request: ".$actual_link."?date='day'&time='time'";
        die();
    }
    $date = $_GET['date'];
    $time = $_GET['time'];
    $sql = "INSERT INTO `data_time`(`date`, `time`) VALUES('$date', '$time')";
    mysqli_query($connection, $sql);

    if (mysqli_error($connection) == "") {
        echo "Thành công";
    }else{
        echo "Đã xảy ra lỗi hệ thống!, vui lòng thử lại sau";
    }
    mysqli_close($connection);
?>