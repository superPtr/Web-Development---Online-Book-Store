<?php
include "Functions/connection.php";

if (!isset($_GET["code"])) {
    exit("Can't find page");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($connect, "SELECT email FROM reset_pass WHERE code='$code'");
if (mysqli_num_rows($getEmailQuery) == 0) {
    exit("Can't find page");
}

if (isset($_POST["submit"])) {
    $pw = $_POST["Pass"];
    $pw2 = $_POST["Pass2"];

    if ($pw != $pw2) {
        echo '<script type ="text/JavaScript">';
        echo 'alert("The passwords does not match")';
        echo '</script>';
    } else {

        $row = mysqli_fetch_array($getEmailQuery);
        $email = $row["email"];

        $query = mysqli_query($connect, "UPDATE customer SET password='$pw' WHERE email='$email'");

        if ($query) {
            $query = mysqli_query($connect, "DELETE from reset_pass WHERE code='$code'");
            echo '<script>alert("Password Updated Successfully!!!");
            window.location.replace("cust_login.php");
            </script>';
        } else {
            echo '<script>alert("Failed to Update Password!!! Please Try Again!!!");
            window.location.replace("forget_pass.php");
            </script>';
        }
    }
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
    <form method="POST">
        <div class="reset_pass">
            <div class="text">
                <h1>Reset Password</h1>
            </div>

            <label for="Pass"><b>Password</b></label><br>
            <input type="password" placeholder="Please enter your password" name="Pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required
            class="input"><br>
            <br>

            <label for="Pass2"><b>Confirm Password</b></label><br>
            <input type="password" placeholder="Please re-enter your password" name="Pass2" required class="input">
            <br>

            <button type="submit" name="submit">Reset Password</button>
        </div>
    </form>
</body>

</html>