<?php
session_start();


include './config.php';

$authtoken = $_SESSION['authtoken'];

echo $authtoken;


if (isset($_GET['new'])) {
     $user_id = $_SESSION['user_id'];

   $rand = rand(0, 999999);
        $code = md5($rand);
        $time = time();
        $sql = "INSERT INTO `authtokens`( `user_id`, `token`, `time`) VALUES ('$user_id','$code','$time')";
        mysqli_query($con, $sql);
        $_SESSION['authtoken'] = $code;
        echo $code;
}