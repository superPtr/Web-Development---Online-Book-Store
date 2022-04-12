<?php
// Create Connection to Database ---Start
include_once "connection.php";
// Create Connection to Database -- End

// When Admin Click Delete Button in Customer Report
if(isset($_GET['delCus_ID'])) {
    $delID = $_GET["delCus_ID"];

    // Delete Specific Record from cart
    $query = "DELETE FROM cart WHERE Cust_ID = '$delID'";
    $run = mysqli_query($connect, $query);

    // Change Some Data in Specific Record from customer
    $query2 = "UPDATE customer SET Username = 'invalid_user', Email = '-', PhoneNo = '-', Address = '-', Password = '-' WHERE CustID = '$delID';";
    $run2 = mysqli_query($connect, $query2);

    // Change Some Date in Specific Recrod from history
    $query3 = "UPDATE history SET customer_name = 'invalid_user' WHERE CustID = '$delID'";
    $run3 = mysqli_query($connect, $query3);

    // Redirect User Back to Home Page
    echo "<script type='text/javascript'>
    alert('Customer is deleted!');
    window.location='../customer_report.php';
    </script>";
    
}

?>