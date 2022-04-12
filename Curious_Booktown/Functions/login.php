<?php
// Create Connection to Database
include_once "connection.php";

//If User Click Login
if (isset($_POST['login'])) {
    // Get User Inputs
    $Username = mysqli_real_escape_string($connect, $_POST["UName"]);
    $User_Password = mysqli_real_escape_string($connect, $_POST["Pass"]);
    // SQL Query
    $sql = "SELECT CustID FROM customer WHERE Username = '$Username' and Password = '$User_Password'";
    $result = mysqli_query($connect, $sql);

    // Fetch Ordered Data In Database
    $row = mysqli_fetch_array($result);
    // Calculate Number of Rows
    $count = mysqli_num_rows($result);

    // If Username and Password Matched
    if ($count == 1) {
        // Record User in Session
        $_SESSION['user_id'] = $row['CustID'];
        $_SESSION['login_user'] = $Username;
        // Redirect to Main Page
        header("location: index.php");

        //Saving login credetials in cookie
        //Check if remember me checkbox is ticked
        if(!empty($_POST["remember"])) {
            setcookie("UName", $Username, time()+ 3600);
            setcookie("password", $User_Password, time()+ 3600);
            echo "Cookies set";
        }else{
            setcookie("UName","");
            setcookie("password","");
            echo "cookies not set";
        }
        

    // If Username and Password Not Matched
    } else {
        //Display Message
        echo '<script type ="text/JavaScript">';
        echo 'alert("Invalid login credentials!!")';
        echo '</script>';
    }
}

?>