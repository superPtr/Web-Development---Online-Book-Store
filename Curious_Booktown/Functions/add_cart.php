<?php
// Create Connection to Database
include_once "connection.php";

//Start Session
session_start();

//If User Click Add to Cart
if(isset($_POST["add_to_cart"])){
    // Check Whether User Login or No
    if(isset($_SESSION['login_user'])){
        // If Yes, Get Input Amount and Product ID
        $amount = $_POST['amount'];
        $id = $_POST['book_id'];
        // Get Product Details
        $query = "SELECT * FROM stock INNER JOIN book on book.book_id = stock.book_id WHERE book_status = 'available' and stock.book_id = $id";
        $run = mysqli_query($connect, $query);
        $cnt = 0;
        while($row = mysqli_fetch_array($run)) {
            $cnt += 1;      
        }
        $quantity = $cnt;

        $query = "SELECT *FROM book WHERE book_id = '$id'";
        $run = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($run)){
            $name = $row["name"];
            $price = $row["price"];
        }
        // If Product In Stock is More Than or Equal to Customer Add to Cart Amount
        if($quantity >= $amount){
            // Get Customer Details
            $user = $_SESSION['login_user'];
            $query_2 = "SELECT CustID FROM customer WHERE Username = '$user'";
            $run_2 = mysqli_query($connect, $query_2);
            while ($row_2 = mysqli_fetch_array($run_2)) {
                $user_id = $row_2['CustID'];
            }

            // Calculate Total Price For the Product
            // Total Price = Purchase Amount * Price
            $total_price = $amount * $price;    

            // Check Whether Item is Already In Cart
            //SQL Query
            $count = 0;
            $query_3 = "SELECT * FROM cart WHERE book_id = '$id' AND Cust_ID = '$user_id'";
            $run_3 = mysqli_query($connect, $query_3);
            while($row = mysqli_fetch_array($run_3)){
                $count = 1;
            }

            // If Item Already In Cart
            if ($count > 0) {
                //read the original amount thais already in cart
                $sql1 = "SELECT * FROM cart WHERE book_id = '$id' AND Cust_ID = '$user_id'";
                $run_4 = mysqli_query($connect, $sql1);
                while ($row_3 = mysqli_fetch_array($run_4)){
                    $ini_amount = $row_3['amount'];
                }

                
                

                // add product to cart again 
                $sql = "UPDATE cart SET amount = $ini_amount + $amount WHERE book_id = '$id' AND Cust_ID = $user_id";
                mysqli_query($connect, $sql);
                echo "<script type='text/javascript'>
                alert('Amount updated!!!');
                window.location='../product.php';
                </script>";
            }
                 
            
            // If Item is Not In Cart
            else {
                // Add Item into Cart Table
                $query = "INSERT INTO cart VALUES('','$id', '$user_id', '$name',  '$user', '$price', '$amount', $total_price, now())";
                $run = mysqli_query($connect, $query);
                // Display Message
                
                echo "<script type='text/javascript'>
                alert('Product Added to Cart!!!');
                window.location='../product.php';
                </script>";
            }
        }
        // If Product In Stock is Less Than Customer Add to Cart Amount
        else{
            //Alert Customer
            echo "<script type='text/javascript'>
                alert('Not Enough Product In Stock. Currently In Stock Amount: $quantity !!!');
                window.location='../product.php';
                </script>";
        }
    // If User Not Login
    }else {
        //Display Message and Redirect User to Login Page
        echo "<script type='text/javascript'>
        alert('Please Login to Add Product to Cart!!!');
        window.location='../cust_login.php';
        </script>";
    }
}

?>