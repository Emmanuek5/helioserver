<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "helioserver";


$con = mysqli_connect($host,$user,$pass,$db);
if ($con) {
    # code...
}else {
    echo("Connction Failed");
}