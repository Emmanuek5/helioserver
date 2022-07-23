<?php
session_start();
include './config.php';


$firstnames = array("John", "Mike", "Will", "Pete", "Lucy", "Barbara");
$lastnames = array("Johnson", "Jackson", "Williams", "Smith");

$random_firstname = $firstnames[array_rand($firstnames)];
$random_lastname = $lastnames[array_rand($lastnames)];

$fullname = $random_firstname . " " . $random_lastname;


$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql = "SELECT * FROM `users` WHERE `user_name` = '$username'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    echo ("User Already Exists");
  



    
} else {
    if (strlen($password) > 5) {
    
      $user_id = md5(rand(0,999999));
        $newpass = password_hash($password,PASSWORD_DEFAULT);
     $sql = "INSERT INTO `users`( `user_id`, `password`, `email`, `name`, `user_name`) VALUES ('$user_id','$newpass','$email','$fullname','$username')";
    $query = mysqli_query($con,$sql);
        $_SESSION['user_data'] = $row;
        $rand = rand(0, 999999);
        $code = md5($rand);
        $time = time();
        $sql = "INSERT INTO `authtokens`( `user_id`, `token`, `time`) VALUES ('$user_id','$code','$time')";
        mysqli_query($con, $sql);
        $_SESSION['authtoken'] = $code;
    echo ("success");
    
    } else {
        echo ("Password must be at least 6 chars");
    }
}
