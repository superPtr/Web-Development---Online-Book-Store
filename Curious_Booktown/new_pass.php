<?php
    session_start();

    include_once "Functions/connection.php";

    function AlertPhp($msg) {
        echo "<script type='text/javascript'>alert('".$msg."')</script>";
    }

    $uName = $_SESSION["temp_username"];

    if(isset($_POST['new_password'])) {
        $newPass = $_POST['new_password'];
        $confirm_pass = $_POST['conf_pass'];
        if (strcmp($newPass, $confirm_pass) == 0) {
            $chk_uName = mysqli_query($connect, "SELECT * FROM customer WHERE Username = '$uName'");

            if(mysqli_num_rows($chk_uName) == 1) {
                $resetPass = "UPDATE customer SET Password = '$newPass' WHERE Username = '$uName'";
                if(mysqli_query($connect, $resetPass)) {
                    header("Location: cust_login.php");
                }
                else {
                    AlertPhp("Failed to Reset Password!");
                }
            }
            else {
                AlertPhp("Failed to Reset Password!");
            }
        }
        else {
            AlertPhp("New password is not same with confirm pasword.\nPlease try again!");
        }
    mysqli_close($connect);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="CSS/forget_pass.css">

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
    
    <form action="" method="POST">
        <div class="reset_pass">
            <div class="text">
                <h2>Forgot your password?</h2>
                <p>Reset your password.</p><br>
            </div>

            <label>Password</label><br>
            <input type="text" name="new_password" class="input" placeholder="Please Enter Your New Password" autocomplete="off">
            <br>
            <label>Confirm Password</label><br>
            <input type="text" name="conf_pass" class="input" placeholder="Please Enter Again Your New Password" autocomplete="off">
            <br>

            <button type="submit" name="reset">Reset Password</button>

            <div class="option">
                <label for="register">
                No account with us?
                <a href="register.php">Register Here</a>
                </label>
            </div>    
        </div>
    </form>

</body>
</html>