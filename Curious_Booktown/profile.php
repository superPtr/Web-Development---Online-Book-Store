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
    <title>CuriousBooktown | Profile</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="CSS/profile.css">
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


    <main>
        <!--- User Profile Details Start --->
        <div class="profile_section">
            <div class="container">
                <div class="title">
                    <h2>User Profile</h2>
                </div>
            </div>
            <div class="about">
                <table border="1" class="profile">
                <?php
                    // Get User
                    $userid = $_SESSION['user_id'];
                    // SQL Query
                    $query = "SELECT * FROM customer WHERE CustID = '$userid'";
                    $run = mysqli_query($connect, $query);
                    // Put Items in Array
                    while($row = mysqli_fetch_array($run)){
                        $name =  $row['Username'];
                        $email = $row['Email'];
                        $phone = $row['PhoneNo'];
                        $address = $row['Address'];
                        $CustID = $row['CustID'];
                    }
                ?>
                <!--- Display User Information --->
                <tr>
                        <th>Username:</th>
                        <td><?php echo $name ?></td>
                    </tr>
                    <tr>
                        <th>E-mail:</th>
                        <td><?php echo $email ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number:</th>
                        <td><?php echo $phone ?></td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td><?php echo $address ?></td>
                    </tr>
                </table>
                <a href="edit_profile.php?edit_userID=<?php echo $CustID?>" class=edit_profile><img class="edit_icon" src="Images/edit_icon.png"></a>
            </div>
            <!--- User Profile Details End --->


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


            <!--- Purchase History Section Start --->
            <div class="purchase">
                <div class="title">
                    <h2>Purchase History</h2>
                </div>
                <div class="products">

                    <?php
                    //Add Profile Pagination File
                    include_once "Functions/profile_pagination.php";

                    //If Bigger than 0 (Purchase History Found)
                    if($count > 0){
                        $cnt = 0;
                        while ($row = mysqli_fetch_array($run)){
                                $cnt += 1;
                                // End ---- Finding the Default Number of Page when User Did Not Click Filter or Clear and Set Number of Product per Page
                                ?>

                                <!--- Display Purchase History --->
                                    <table width:100%>
                                        <tr>
                                            <th></th>
                                            <th>Total Price</th>
                                            <th>Purchase Date</th>
                                        </tr>
                                        <tr>
                                        <td ><form method="post"><button class="history_button" type="submit" name="history_id" class="btn" value="<?php echo $row["history_id"]?>"><?php echo $cnt?></button></form></td>
                                           
                                            <td><?php echo $row['total_price'] ?></td>
                                            <td><?php echo $row['r_date'] ?></td>
                                        </tr>
                                    </table>
                                <?php
                                    }
                    //If Equal to 0 (Purchase History Not Found)
                    }
                    else{ 
                        ?>
                                        
                        <div class="product_sec">
                            <!--- Display No Puchase History --->
                            <p><?php echo '&nbsp &nbsp No Purchase History' ?></p>
                        </div>

                    <?php } ?>

                    <div class="pagination">
                    <?php
                    
                    // Display Page Numbers
                    for ($pages = 1; $pages <= $pages_num; $pages++) {
                        echo '<p><a href="profile.php?page='.$pages.'">'.$pages.'</a></p>';
                    }
                    ?>
                    </div>
                </div>
            </div>
            <!--- Purchase History Section End --->
        </div>
    </main>


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <!--- Footer Start --->
    <?php include_once "footer.php" ?>
    <!-- Footer End -->


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <!--- Javascript Start--->
    <script>
        // Responsive NavPanel
        var navLinks = document.getElementById("navPanel");

        // Show Menu
        function showPanel() {
            navLinks.style.right = "0px"
        }

        // Hide Menu
        function hidePanel() {
            navLinks.style.right = "-300px"
        }

        function closeMsg(){
                    document.getElementById("popup").classList.toggle("enable");
                }


    </script>
    <!--- Javascript Start End--->
    <?php
            if(isset($_POST['history_id'])){
                // Get User
                    $userid = $_SESSION['user_id'];
                    $key =  $_POST["history_id"];
                // Start ---- Product History Pagination and Display User Purchase History

                // // SQL Query to Get All User Purchase History
                $user = $_SESSION['login_user'];
                $query = "SELECT *FROM history WHERE CustID = '$userid'";
                $run = mysqli_query($connect, $query);

                // // Calculate Number of Rows in Database (Number of Rows in User Purchase History)
                $total_product = mysqli_num_rows($run);


                // SQL Query to Display 5 Items per Page
                $query = "SELECT book.image, book.author, book.name, book.price,bill.serial_number,history.r_date 
                FROM (((book 
                INNER JOIN stock ON book.book_id = stock.book_id )
                INNER JOIN bill ON bill.serial_number = stock.serial_number)
                INNER JOIN history ON history.history_id = bill.history_id)
                WHERE history.CustID = '$userid' AND history.history_id = '$key' ORDER BY r_date";
                $run = mysqli_query($connect, $query);

                //Calculate Number of Rows in User Purchase History
                $count = mysqli_num_rows($run);
            }
?> 


        <div class="popup" id="popup">
            <div class="overlay"></div>
            <div class="selection">
                <div class="closeBtn" onclick="closeMsg()">
                    &times;
                </div>
                <div class="option">


                <div class="products">

                    <?php

                    //If Bigger than 0 (Purchase History Found)
                    
                        while ($row = mysqli_fetch_array($run)){
                    
                    // End ---- Finding the Default Number of Page when User Did Not Click Filter or Clear and Set Number of Product per Page
                    ?>

                    <!--- Display Purchase History --->
                    <div class="product_sec">
                        <img src="Images/<?php echo $row['image'] ?>" alt="">
                        <div class="content">
                            <p class="brand"><?php echo $row['name'] . ' - ' . $row['author']?></p>
                            <p class="price"><?php echo 'Price: ' . $row['price']?></p>
                            <p class="price"><?php echo 'Serial Number: ' . $row['serial_number']?></p>
                            <p><?php echo 'Purchase Date: ' . $row['r_date']?></p>
                        </div>
                    </div>
                    <?php
                        }
                    //If Equal to 0 (Purchase History Not Found)
                     ?>
                </div>

            
                </div>
            </div>
        </div> 
<?php
if(isset($_POST['history_id'])){
echo "<script type='text/javascript'>document.getElementById('popup').classList.toggle('enable'); </script>"; }?>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
</body>
</html>