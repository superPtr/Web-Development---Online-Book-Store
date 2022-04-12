


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/edit_profile.css">
</head>
<body>
    <?php
    // Create Connection to Database
    include_once "Functions/connection.php";

        // Get User
        $userID = $_GET['edit_userID'];
        // SQL Query
        $query = "SELECT * FROM customer WHERE CustID = '$userID'";
        $run = mysqli_query($connect, $query);
        // Put Items in Array
        while($row = mysqli_fetch_array($run)){
            $name =  $row['Username'];
            $email = $row['Email'];
            $phone = $row['PhoneNo'];
            $address = $row['Address'];
            $password = $row['Password'];
        }
    ?>
    <div class=box>
        <p id=storename>Curious Booktown</p>
        <h1><u>Edit Profile </u></h1>
            <form action="#" method="post" class=form>
                <div class="edit_pff">
                    <div class="edit_title">
                        <label>Username:</label>
                    </div>
                    <div class="edit_input">
                        <input type="text" name='username' class=inputbox value="<?php echo $name?>"><br><br>
                    </div>
                </div>
                <div class="edit_pff">
                    <div class="edit_title">
                        <label>E-mail:</label>
                    </div>
                    <div class="edit_input">
                        <input type="text" name='email' class=inputbox value="<?php echo $email?>"><br><br>
                    </div>
                </div>
                <div class="edit_pff">
                    <div class="edit_title">
                        <label>Phone Number:</label>
                    </div>
                    <div class="edit_input">
                    <input type="text" name='phone' class=inputbox value="<?php echo $phone?>"><br><br>
                    </div>
                </div>
                <div class="edit_pff">
                    <div class="edit_title">
                        <label>Address:</label>
                    </div>
                    <div class="edit_input">
                    <input type="text" name='address' class=inputbox value="<?php echo $address?>"><br><br>
                    </div>
                </div>
                <div class="edit_pff">
                    <div class="edit_title">
                        <label>Password:</label>
                    </div>
                    <div class="edit_input">
                    <input type="password" name='password' class=inputbox value="<?php echo $password?>"><br>
                    </div>
                </div>
                <p>* Just leave it if do not want to change password </p><br>
                <button type="submit"  name="submit">Make Changes</button>
            </form>

    </div> 
    <?php
        session_start();
        $Username =  0;
        $Email = 0;
        $PhoneNo =  0;
        $Address = 0;
        $Password =0;
        if(isset($_POST["submit"])){
            $Username =  $_POST["username"];
            $Email = $_POST["email"];
            $PhoneNo =  $_POST["phone"];
            $Address = $_POST["address"];
            $Password = $_POST["password"];
            $query = "UPDATE customer SET Username='$Username',  Email='$Email', PhoneNo='$PhoneNo', `Address`='$Address', `Password`='$Password' WHERE CustID = '$userID'";
            
            mysqli_query($connect, $query);
            if(mysqli_query($connect,$query)){
                    $_SESSION['user_id'] = $userID;
                    $_SESSION["login_user"]=$Username;
                    echo "<script type='text/javascript'>
                    alert('Changes Applied Succesfully!!!');
                    window.location='index.php';
                </script>";
            }else{
                echo mysqli_error($connect);
            }
            // Display Message and Redirect User to Index Page

        }
    ?>
</body>
</html>