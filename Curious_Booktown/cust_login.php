<?php
// Start Session
session_start();
// Add Login File
include "Functions/login.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="CSS/login.css">

    <!--- Google Fonts --->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    
    <!--- Fonts Awesome Icons --->
    <script src="https://kit.fontawesome.com/9a0e60687c.js" crossorigin="anonymous"></script>

</head>
<body>

    <!--- Form Section Start --->
    <form name="login" action="#" method="POST">
        <div class="login">
            <!--- Input Fields --->
            <label for="UName"><b>Username</b></label><br>
            <input type="text" placeholder="Please enter your username" name="UName" required 
            value="<?php if(isset($_COOKIE["UName"])) { echo $_COOKIE["UName"]; } ?>">
            <br>

            <label for="Pass"><b>Password</b></label><br>
            <input type="password" placeholder="Please enter your password" name="Pass" required 
            value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
            <br>

            <label>
            <input type="checkbox" name="remember" checked>Remember me
            </label>
            <span class="Pass"><a href="forget_pass.php">Forgot Password?</a></span>
            <br>
            <button type="submit" name="login">Login</button>
            <br>

            <!--- Create A Link to User if They Do Not Have an Account --->
            <div class="option">
            <label for="register">
            No account with us?
            <a href="register.php">Register Here</a>
            </label>
            </div>

            <!--- Create A Link to User ff They Are Admin --->
            <div class="option">
            <label for="register">
            Admin Login?
            <a href="admin_login.php">Login Here</a>
            </label>
            </div>
        </div>
    </form>
    <!--- Form Section End --->

</body>
</html>