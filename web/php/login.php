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
    } else {
        echo ("Password incorrect");
    }
}