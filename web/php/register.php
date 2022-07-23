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

    if ($password > 6) {
        
    

    }else {
        echo("Password must be at least 6 chars");
    }
  



    
} else {
    echo ("User Already Exist");
}
