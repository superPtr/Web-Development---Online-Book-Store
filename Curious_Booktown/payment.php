<?php
// Create Connection to Database
include_once "Functions/connection.php";

// Start Session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="CSS/payment.css">

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

    <!--- Payment Form Start --->
    <div class="container">
        <h3>We Accept: </h3>
        <!--- Payment Method Images --->
        <div class="method">
            <img src="images/visa.png" alt="">
            <img src="images/mastercard.png" alt="">
            <img src="images/paypal.png" alt="">
            <img src="images/american_express.png" alt="">
        </div>
    
        <!--- Payment Form Input --->
        <form action="" method="POST">
            <div class="input">
                <label>Name on Card:</label><br>
                <input type="text" placeholder="Enter Card Owner Name" autocomplete="off" required>
            </div>
            <div class="input">
                <label>Card Number:</label><br>
                <input type="text" placeholder="Enter Card Number" autocomplete="off" required>
            </div>
            <div class="input">
                <label>Expiration Date:</label><br>
                <input type="text" placeholder="Enter Card Expiration Date (MM/YY)" autocomplete="off" required 
                pattern="[0-9]{2}/[0-9]{2}" title="MM/YY Format">
            </div>
            <div class="input">
                <label>CV Number:</label><br>
                <input type="text" placeholder="Enter CV Number" autocomplete="off" required 
                pattern="[0-9]{3}" title="3 Numbers Only">
            </div>
            <button type="submit" name="pay">Confirm Payment</button>
        </form>
    </div>
    <!--- Payment Form End --->

</body>
</html>

<?php

// If Click Proceed to Payment Button
if(isset($_POST['pay'])){

    //Get User Session
    $user = $_SESSION['login_user'];



    //Scan history to get history_id
    $query_get_historyid = "SELECT * FROM history";
    $run = mysqli_query($connect,$query_get_historyid);
    $history_row = mysqli_num_rows($run);
    $history_row += 1;


    // Insert Cart Items Into History Table
    $query = "SELECT cart.Cust_ID FROM cart INNER JOIN book ON cart.book_id = book.book_id 
    WHERE customer_name = '$user'";
    $run = mysqli_query($connect, $query);
    $sum = 0;
    $row_id = mysqli_fetch_array($run);
    $customerID = $row_id['Cust_ID'];
    $query_3 = "INSERT INTO history VALUES('$history_row','$customerID','$user', $sum, now())";
    $run4 = mysqli_query($connect, $query_3);    
    if($run4){

    }else{
        echo mysqli_error($connect);
    }

    // SQL Query 1 (Get User Cart Items)
    $query = "SELECT *FROM cart INNER JOIN book ON cart.book_id = book.book_id 
    WHERE customer_name = '$user'";
    $run = mysqli_query($connect, $query);

    // Read cart item x5
    while($row = mysqli_fetch_array($run)){
        $bookid = $row['book_id'];
        $customerID = $row['Cust_ID'];
        $amount = $row['amount'];
        $total_price = $row['total_price'];
        $sum += $total_price;
        


        //read from table stock
        //update stock status to sold
        $query_read_serial_number = "SELECT * FROM stock WHERE book_id = $bookid AND book_status = 'available' ORDER BY serial_number LIMIT $amount";
        $run2 = mysqli_query($connect,$query_read_serial_number);
        while($row2 = mysqli_fetch_array($run2)){
            $SN = $row2['serial_number'];
            $query_update_book_status = "UPDATE stock SET book_status = 'sold' WHERE serial_number = '$SN'";
            mysqli_query($connect, $query_update_book_status);        
            
            // Insert serial number and historyid to bill
            $query_insert_serial = "INSERT INTO bill(serial_number, history_id) VALUES ('$SN','$history_row')";
            mysqli_query($connect,$query_insert_serial);
        }
    }

    //update history total price
    $query = "UPDATE history SET total_price = '$sum' WHERE history_id = '$history_row'";
    mysqli_query($connect, $query);


    // Delete User Cart Item
    $query_4 = "DELETE FROM cart WHERE customer_name = '$user'";
    mysqli_query($connect, $query_4);

    // Redirect User Back to Home Page
    echo "<script type='text/javascript'>
    alert('Payment Success!!! Thank You for Choosing CuriousBooktown!!!');
    window.location='receipt.php';
    </script>";


}



?>