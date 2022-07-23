<?php
session_start();


include './config.php';

$authtoken = $_SESSION['authtoken'];

echo $authtoken;