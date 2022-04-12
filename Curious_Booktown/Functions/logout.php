<?php

// Start Seesion
session_start();

//Remove Session
unset($_SESSION['login_user']);

//Redirect to Login Page
echo header("location: ../cust_login.php");

?>