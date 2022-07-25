<?php
session_start();
include './config.php';
$token = $_GET['token'];   


$sql = "SELECT * FROM `authtokens` WHERE `token` = '$token'";
$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];
    $time = $row['time'];
    $time2 = time();
   
    $diff = $time2 - $time;
    if ($diff > 3600) {
        echo("Token Expired");
    }else {
        $sql = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        $data = $row;

        echo(json_encode($data,JSON_PRETTY_PRINT)); 
    }
}else {
    echo "Invalid Token";
}


