<?php

// Create Connection to Database
include "functions/connection.php";
if(isset($_POST['register'])){
    // Get User Input
    $Username = mysqli_real_escape_string($connect, $_POST['UName']);
    $Email = mysqli_real_escape_string($connect, $_POST['Email']);
    $PhoneNo = mysqli_real_escape_string($connect, $_POST['PhoneNo']);
    $Address = mysqli_real_escape_string($connect, $_POST['Address']);
    $Pass = mysqli_real_escape_string($connect, $_POST['Pass']);
    $Pass2 = mysqli_real_escape_string($connect, $_POST['Pass2']);
    $errors = 0;

    // Check Password
    if ($Pass != $Pass2){  
        $error["password"] = "<p><font color=red> The password does not match! </font></p>";
        $errors = 1;
    }

    // check If Input Already Exist in Database
    $user_check_query = "SELECT * FROM customer WHERE Username = '$Username' OR Email = '$Email' OR PhoneNo = '$PhoneNo' LIMIT 1";
    $result = mysqli_query($connect, $user_check_query);
    $user = mysqli_fetch_assoc($result);
            
    if($user) {
        // If Same Username Found in Database        
        if ($user['Username'] === $Username){
            $error["username"] = "<p><font color=red> Username is already exist! </font></p>";
            $errors = 1;
        }

        // If Same Email Found in Database    
        if ($user['Email'] === $Email){
            $error["email"] = "<p><font color=red> Email is already exist! </font></p>";
            $errors = 1;
        }

        // If Same Phone Number Found in Database    
        if ($user['PhoneNo'] === $PhoneNo){
            $error["phoneno"] = "<p><font color=red> Phone Number is already exist! </font></p>";
            $errors = 1;
        }
    }
            
    // Register the User If Nothing Invalid in the Form
    if($errors == 0){
        //SQL Query
        $query = "INSERT INTO customer ( Username, Email, PhoneNo, Address, Password)
        VALUES ('$Username','$Email','$PhoneNo','$Address','$Pass')";
        mysqli_query($connect, $query);
        // Display Message and Redirect User to Login Page
        echo "<script type='text/javascript'>
        alert('Account Registered Succesfully!!!');
        window.location='cust_login.php';
        </script>";
    }

    // Variable for detect error
    if($errors == 1) {
        $error_check = $errors;
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="CSS/register.css">

    <!--- Google Fonts --->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    
    <!--- Fonts Awesome Icons --->
    <script src="https://kit.fontawesome.com/9a0e60687c.js" crossorigin="anonymous"></script>

    <!--- jQuery CDN --->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    
    <!---- js Function for Pop up error msg Start ---->
    <script>
        function popUp() {
            $(window).load(function () {
                $('.hover_bkgr_box').show();
                $('.popupCloseButton').click(function(){
                    $('.hover_bkgr_box').hide();
                });
            });
        }
    </script>
        
    <!---- js Function for Pop up error msg End ---->

</head>
<body>
    <!--- Form Section Start --->
    <form name="register" action="#" method="POST">
        <div class="register">
            <!--- Input Fields --->
            <label for="Uname"><b>Username</b></label><br>
            <input type="text" placeholder="Please enter your Username" name="UName" required
            value="<?php if(isset($error_check)) {echo $_POST['UName'];} ?>">
            <!--- Print Out Text in Array --->
            <?php  if(isset($error["username"])) {echo $error["username"];}?>
            <br>

            <label for="Email"><b>E-mail</b></label><br>
            <input type="email" placeholder="Please enter your E-mail" name="Email" required
            value="<?php if(isset($error_check)) {echo $_POST['Email'];} ?>">
            <!--- Print Out Text in Array --->
            <?php  if(isset($error["email"])) { echo $error["email"]; }?>
            <br>

            <label for="PhoneNo"><b>Phone Number</b></label><br>
            <input type="tel" placeholder="Please enter your Phone Number" name="PhoneNo" required 
            pattern="[0-9]+" title="Numbers Only"
            value="<?php if(isset($error_check)) {echo $_POST["PhoneNo"];} ?>">
            <!--- Print Out Text in Array --->
            <?php  if(isset($error["phoneno"])) { echo $error["phoneno"]; }?>
            <br>

            <label>
            <label for="Address"><b>Address</b></label><br>
            <input type="text" placeholder="Please enter your Address" name="Address" required
            value="<?php if(isset($error_check)) { echo $_POST["Address"]; } ?>">
            <br>

            <label for="Pass"><b>Password</b></label><br>
            <input type="password" placeholder="Please enter your password" name="Pass" 
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
            required>
            <!--- Print Out Text in Array --->
            <?php  if(isset($error["password"])) echo $error["password"];?>
            <br>

            <label for="Pass2"><b>Confirm Password</b></label><br>
            <input type="password" placeholder="Please re-enter your password" name="Pass2" required>
            <!--- Print Out Text in Array --->
            <?php  if(isset($error["password"])) echo $error["password"];?>
            <br>
            
            <label>
            <button type="submit" name = "register">Register</button>
            <br>
            </label>

            <div class="option">
            <label for="register">
            Already Got an Account?
            <a href="cust_login.php">Login Here</a>
            </label>
            </div>
        </div>
    </form>
    <!--- Form Section End --->

    <!---- Pop Up Window Message Section Start ---->

    <!--- HTML Code for Pop Up Msg Start ---->
    <div class="hover_bkgr_box">
        <span class="helper"></span>
        <div>
            <div class="popupCloseButton">&times;</div>
            <p class="s1">Registration failed!</p><br>
            <p>There are some invalid data. Please input again!</p>
        </div>
    </div>
    <!--- HTML Code for Pop Up Msg End ---->
    <!--- IF detect error, the error msg will pop up START --->
    <?php
        if (isset($error_check)) {
            echo '<script>';
            echo 'popUp()';
            echo '</script>';
        }
    ?>    
    <!--- IF detect error, the error msg will pop up END --->

    <!---- Pop Up Window Message Section End ---->
    
</body>
</html>