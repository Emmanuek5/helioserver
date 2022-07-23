<?php
session_start();
include './config.php';

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM `users` WHERE `user_name` = '$username'";
$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) < 1) {
   
    echo("User Not Found");


}else {
    $row = mysqli_fetch_assoc($result);
    $password1 = $row['password'];

    if (password_verify($password, $password1)) {
    $user_id = $row['user_id'];
        $_SESSION['user_name'] = $row;
        $rand = rand(0,999999);
        $code = md5($rand);
        $time = time();
     $sql = "INSERT INTO `authtokens`( `user_id`, `token`, `time`) VALUES ('$user_id','$code','$time')" ;
     mysqli_query($con,$sql);
    $_SESSION['authtoken'] = $code;
    echo("success");
    } else {
        echo("Password is incorrect");
    }
    
   
}