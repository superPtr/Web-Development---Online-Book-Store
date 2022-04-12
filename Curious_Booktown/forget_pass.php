<?php
    session_start();

    include_once "Functions/connection.php";

    function AlertPhp($msg) {
        echo "<script type='text/javascript'>alert('".$msg."')</script>";
    }

    if(isset($_POST["username"])) {
        //Get User Input
        $userName = $_POST["username"];
        $_SESSION['temp_username'] = $_POST["username"];

        //Check Username Exist in Database
        $check_userName = mysqli_query($connect, "SELECT * FROM customer WHERE Username = '$userName'");

        if(mysqli_num_rows($check_userName)==1) {
            header("Location: new_pass.php");
        }
        else {
            AlertPhp("Username does not exist!");
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
                <p>Don't Worry! Just enter your username to reset your password immediately.</p><br>
            </div>

            <label>Username</label><br>
            <input type="text" name="username" class="input" placeholder="Please Enter Your Username" autocomplete="off">
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