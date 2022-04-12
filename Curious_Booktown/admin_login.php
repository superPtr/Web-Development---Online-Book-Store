<?php
// Create Connection to Database
include "functions/connection.php";
// Start Session
session_start();

// If Admin Click Login
if (isset($_POST['login'])) {
    // Get User Input
    $ID = mysqli_real_escape_string($connect, $_POST["ID"]);
    $Admin_Password = mysqli_real_escape_string($connect, $_POST["Pass"]);
    // SQL Query
    $sql = "SELECT * FROM admin WHERE adminID = '$ID' and Password = '$Admin_Password'";
    $result = mysqli_query($connect, $sql);

    // Fetch Ordered Data in Database
    $row = mysqli_fetch_array($result);
    // Count Number of Rows
    $count = mysqli_num_rows($result);

    //If Username and Password Match
    if ($count == 1) {
        // Set Session = Admin ID
        $_SESSION['login_user'] = $ID;
        // Redirect To Dashboard Page
        header("location: dashboard.php");

    //If Username and Password Match  
    } else {
        // Display Message
        echo '<script type ="text/JavaScript">';
        echo 'alert("Invalid login credentials!!")';
        echo '</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

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
            <label for="ID"><b>Admin ID</b></label><br>
            <input type="text" placeholder="Please enter your admin ID" name="ID" required>
            <br>

            <label for="Pass"><b>Password</b></label><br>
            <input type="password" placeholder="Please enter your password" name="Pass" required>
            <br>

            <label>
                <input type="checkbox" checked="checked" name="remember">Remember me
            </label>
         
            <br>
            <label>
            <button name="login" type="submit">Login</button><br>
            </label>

            <!--- Create A Link to User if They Are Not Admin --->
            <div class="option">
            <label for="register">
            Customer Login?
            <a href="cust_login.php">Login Here</a>
            </label>
            </div>
        </div>
    </form>
    <!--- Form Section End --->

</body>
</html>