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
    <title>CuriousBooktown | Cart</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="CSS/cart.css">
    <link rel="icon" href="Images/tab_icon.png">

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
    
    <!--- Creating Navigational Panel Start--->
    <header>
        <nav>
            <h1><a href="index.php">CuriousBooktown</a></h1>
            <div class="nav_panel" id="navPanel">
                <div class="menu_button">
                    <i class="fas fa-caret-right" style="font-size: 35px; margin-left: 6px" ; onclick="hidePanel()"></i>
                </div>
                <!--- Items on NavPanel Start--->
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="product.php">Products</a></li>

                    <!--- PHP Check Session Start --->
                    <?php
                    // If User Log In to the Website
                    if (isset($_SESSION['login_user'])) { ?>

                        <!--- Display Items In Header --->
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="Functions/logout.php">Log Out</a></li>
                        <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>

                        <!--- If User is Not Log In to the Website --->
                    <?php } else { ?>

                        <!--- Display Items In Header --->
                        <li><a href="cust_login.php">Log In/Sign Up</a></li>

                    <?php } ?>
                    <!--- PHP Check Session End --->

                </ul>
                <!--- Items on NavPanel End--->
            </div>
            <div class="menu_button">
                <i class="fas fa-bars" style="font-size: 30px;" onclick="showPanel()"></i>
            </div>
        </nav>
    </header>
    <!--- Creating Navigational Panel End--->


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <!--- Cart Section Start --->
    <main>
        <div class="container">
            <h1>My Cart</h1>
            <div class="cart">
                <div class="products">
                    <!--- Display Cart Items Start --->
                    <?php

                    // Read Items in Database
                    $user_id = $_SESSION['user_id'];

                    // SQL Query (Join book and Cart Table to Get Product and Cart Details)
                    $query = "SELECT * FROM cart INNER JOIN book WHERE book.book_id = cart.book_id AND cart.Cust_ID = '$user_id';";
                    $run = mysqli_query($connect, $query);

                    // Calculate Number of Rows in Cart
                    $count = mysqli_num_rows($run);
                    
                    // If Bigger Than 0 (Item in Cart)
                    if($count > 0){

                    // Put Items in Array
                        while ($row = mysqli_fetch_array($run)) {
                    ?>

                    <!--- Display Items In Customer Cart --->
                    <div class="product_sec">
                        <img src="images/<?php echo $row["image"] ?>" alt="">
                        <div class="content">
                            <p class="brand"><b><?php echo $row["name"] ?></b></p>
                            <p class="name"><?php echo $row["author"] ?></p>
                            <p class="price"><?php echo 'RM' . $row["price"] ?></p>
                            <p class="quantity"><?php echo 'Quantity: '?><button type="submit" name="decrease" class="arrow_button"><a href="Functions/modify_quantity.php?decrease_ID=<?php echo $row["book_id"]?>&p_quantity=<?php echo $row["amount"]?>&price=<?php echo $row["price"]?>" style="text-decoration: none;"><p id="arrow"><</p> </a></button>
                            <?php echo $row["amount"] ?><button type="submit" name="increase" class="arrow_button"><a href="Functions/modify_quantity.php?increase_ID=<?php echo $row["book_id"]?>&p_quantity=<?php echo $row["amount"]?>&price=<?php echo $row["price"]?>" style="text-decoration: none;"><p id="arrow">></p></a></button></p>
                            <p class="quantity"><?php echo 'Total:   RM ' . $row["total_price"] ?></p>
                            <button type="submit" name="remove" class="remove"><a href="Functions/delete_product.php?remove_ID=<?php echo $row["book_id"]?>">
                            Remove Item<i class="fas fa-trash-alt" style="margin: 0px 8px;"></i></a></button>
                        </div>
                    </div>

                    <?php
                        }
                    // If Equal To 0 (No Item in Cart)
                    }else{
                    ?>
                        
                    <div class="product_sec">
                        <!--- Display Item In Cart --->
                        <p><?php echo '&nbsp &nbsp No Item In Cart' ?></p>
                    </div>

                    <?php } ?>
                    <!--- Display Cart Items End --->
                </div>


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


                <!--- Calculate Cart Price Start --->
                <div class="cart_total">
                    <p>
                    <?php
                    // SQL Query
                    $query = "SELECT *FROM cart WHERE Cust_ID = '$user_id'";
                    $run = mysqli_query($connect, $query);

                    // Calculate Number of Rows From Database
                    $total = mysqli_num_rows($run);

                    // Display Total Products
                    echo
                    "<span>Number of Items</span>
                    <span>$total</span>"
                    ?>
                    </p>
                    
                    <p>
                    <?php
                    // SQL Query (Calculate Total Price in Cart)
                    $query = "SELECT SUM(total_price) AS total FROM cart WHERE Cust_ID = '$user_id'";
                    $run = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_array($run)){
                        $total = $row['total'];
                    }

                    // Display Total Price
                    echo
                    "<span>Total Price:</span>
                    <span>RM $total</span>"
                    ?>
                    </p>
                <!--- Calculate Cart Price End --->


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


                    <!--- Proceed to Payment Start --->
                    <form method="GET">
                        <?php
                        // If User Click Proceed to Payment Button
                        if(isset($_GET['payment'])){
                           

                            // SQL Query (Get Product In Cart Information)
                            $query = "SELECT book.name, cart.amount, cart.book_id FROM cart INNER JOIN book 
                            WHERE book.book_id = cart.book_id AND cart.Cust_ID = '$user_id';";
                            $run = mysqli_query($connect, $query);
                            // Put Items In Array
                            while($row = mysqli_fetch_array($run)){
                                $name = $row['name'];
                                $amount = $row['amount'];
                                $id = $row['book_id'];
                                $query = "SELECT * FROM stock INNER JOIN book on book.book_id = stock.book_id WHERE book_status = 'available' and stock.book_id = $id";
                                $run = mysqli_query($connect, $query);
                                $cnt = 0;
                                while($row = mysqli_fetch_array($run)) {
                                    $cnt += 1;      
                                }
                                $quantity = $cnt;
                                //Check If Product In Stock is Less Than Purchase Amount 
                                if($quantity >= $amount){
                                // If Product In Stock is More Than Purchase Amount, Proceed to Payment Page
                                echo "<script type='text/javascript'>
                                window.location='payment.php';
                                </script>";
                                }
                                // If Product In Stock is Less Than Purchase Amount, Display Message
                                else{
                                echo "<script type='text/javascript'>
                                alert('Not Enough Product In Stock. \\nProduct Name: $name \\nCurrently In Stock Amount: $quantity !!!');
                                window.location='cart.php';
                                </script>";
                                }
                            }
                        }
                        ?>
                        <!--- Button for Proceed To Payment --->
                        <button type="submit" name="payment" class="payment">Proceed to Payment</button>                        
                    </form>
                    <!--- Proceed to Payment End --->
                </div>  
            </div>
        </div>
        </section>

    </main>
    <!--- Cart Section End --->

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <!--- Footer Start --->
    <?php include_once "footer.php" ?>
    <!-- Footer End -->


<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <!--- Javascript Start--->
    <script>
        // Responsive NavPanel
        var navLinks = document.getElementById("navPanel");

        //Show Menu
        function showPanel() {
            navLinks.style.right = "0px"
        }

        //Hide Menu
        function hidePanel() {
            navLinks.style.right = "-300px"
        }
    </script>
    <!--- Javascript End--->

    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

</body>
</html>