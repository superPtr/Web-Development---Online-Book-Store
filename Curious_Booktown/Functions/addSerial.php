<?php
// Create Connection to Database --- Start
include_once "connection.php";
// Create Connection to Database --- End


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// When Click Save Button (Add Item Into Database) --- Start
if(isset($_POST["submit"])){
    $name = $_POST["book"];
    $serial_no = $_POST["serial_no"];
    $status = $_POST["status"];

    // Checking Empty Inputs (Form Validation)
    $error = array();

    // If Empty Input Detected, Text Will Stored in Array
    // Input Field Name Validation
    if(empty($name)){
        $error["book"] = "<p><font color=red> Book Name Required! </font></p>";
    }

    // Input Field Image Validation
    if(empty($serial_no)){
        $error["serial_no"] = "<p><font color=red> Serial Number Required! </font></p>";
    }

    $query = "SELECT serial_number FROM stock WHERE serial_number = '$serial_no'";
    $run = mysqli_query($connect, $query);
    if(mysqli_num_rows($run) > 0){
        $error["serial_no2"] = "<p><font color=red> Serial Number Exist! </font></p>";
    }

    // If No Items in Array, Insert Data into Database
    if(count($error) == 0) {
        // Add Item Into Database
        // SQL Query to insert Items into Database
        $query = "INSERT INTO stock (serial_number, book_id, book_status)VALUES
        ('$serial_no', '$name', '$status')";
        mysqli_query($connect, $query);              
        echo "<script type='text/javascript'>
        alert('Book Serial Number Added!!!');
        window.location='dashboard.php';
        </script>";
    }
    
}

// When Click Save Button (Add Item Into Database) --- End


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

?>