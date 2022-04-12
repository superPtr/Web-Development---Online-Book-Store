<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "curiousbooktown";

//Create Connection to Database
$connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if(mysqli_connect_errno()){
    echo "Failed to Connect to Database!";
}

?>
