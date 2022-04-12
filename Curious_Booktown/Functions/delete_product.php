<?php
// Create Connection to Database --- Start
include "connection.php";
// Create Connection to Database --- End


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// When Admin Click Delete Button In Dashboard (Delete Item In Database) --- Start
if(isset($_GET["delete_ID"])){
    $id = $_GET["delete_ID"];

    // Unlink Image From File Directory --- Start
    // SQL Query 1
    $query = "SELECT * FROM book WHERE book_id = $id";
    $run = mysqli_query($connect, $query);
    //Put Image Name In Array
    while($row = mysqli_fetch_array($run)){
        $image = $row['image'];
        // Remove Image From File Directory
        unlink("../Images/$image");
    }
    // Unlink Image From File Directory --- End
    $query3 = "DELETE FROM stock WHERE book_id = $id";
    $run3 = mysqli_query($connect, $query3);
    // Delete Item in Database --- Start
    // SQL Query 2
    $query2 = "DELETE FROM book WHERE book_id = $id";
    $run2 = mysqli_query($connect, $query2);


    echo "<script type='text/javascript'>
    alert('Product Deleted!!!');
    window.location='../dashboard.php';
    </script>";
    
    // Delete Item in Database --- End
}
// When Admin Click Delete Button In Dashboard (Delete Item In Database) --- End


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// When Customer Click Remove Button In Cart (Remove Item In Cart Table) --- Start
if(isset($_GET["remove_ID"])){
    $id = $_GET["remove_ID"];

    // Delete Item in Database --- Start
    // SQL Query 2
    $query = "DELETE FROM cart WHERE book_id = $id";
    mysqli_query($connect, $query);
    header("location:../cart.php");
    // Delete Item in Database --- End
}
// When Click Delete Button (Delete Item In Database) --- End


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

?>