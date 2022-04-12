<?php
// Create Connection to Database --- Start
include_once "connection.php";
// Create Connection to Database --- End


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// When Customer Click Decrease Button In Cart  --- Start
if(isset($_GET["decrease_ID"])) {
    $id = $_GET["decrease_ID"];
    $amount = $_GET["p_quantity"];
    $amount = (INT)$amount - 1;
    if ($amount>=1) {
        $price = $_GET["price"];
        $price = (float)$price;
        $total_price = $amount * $price;

        // Decrease quantity of product in database ---- Start
        $query = "UPDATE cart SET amount = '$amount', total_price = '$total_price' WHERE book_id = $id";
        // Decrease quantity of product in database ---- End
    }
    else {
        $query = "DELETE FROM cart WHERE book_id = $id";
    }
    mysqli_query($connect, $query);
    header("location:../cart.php");
}
// When Customer Click Decrease Button In Cart  ---  End

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// When Customer Click Increase Button In Cart --- Start
if(isset($_GET["increase_ID"])) {
    $id = $_GET["increase_ID"];
    $amount = $_GET["p_quantity"];
    $amount = (INT)$amount + 1;
    $query1 = "SELECT * FROM stock INNER JOIN book on book.book_id = stock.book_id WHERE book_status = 'available' and stock.book_id = $id";
    $run = mysqli_query($connect, $query1);
    $cnt = 0;
    while($row = mysqli_fetch_array($run)) {
        $cnt += 1;      
    }
    $quantity = $cnt;

    if($quantity>=$amount) {
        $price = $_GET["price"];
        $price = (float)$price;
        $total_price = $amount * $price;
        // Increase Quantity of product in database ---- Start
        $query = "UPDATE cart SET amount = '$amount', total_price = '$total_price' WHERE book_id = $id";
        mysqli_query($connect, $query);
        header("location:../cart.php");
    // Increase Quantity of product in database ---- End
    }
    else {
        echo '<script type ="text/JavaScript">';
        echo 'alert("You have reached the maximum quantity available for this book!")
        window.location="../cart.php";';
        echo '</script>';
    }
}
// When Customer Click Increase Button In Cart --- End


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

?>