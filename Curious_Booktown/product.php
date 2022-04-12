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
    <title>CuriousBooktown | Products</title>

    <!--- External CSS --->
    <link rel="stylesheet" href="css/product.css">
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
        <div class="title">
            <h1>Our Product</h1>
        </div>
        <div class="container">
            <section>
                <!--- Filter Form Start --->
                <form method="GET">
                    <div class="form">
                        <label class="filter">Filter Product Category: </label>
                        <select name="p_category" class="input">

                            <?php
                            // SQL Query to Get genre Type
                            $query = "SELECT *FROM genre";
                            $run = mysqli_query($connect, $query);
                            $current_genre_id = $_GET['p_category'];
                            $query2 = "SELECT * FROM genre WHERE genre_id = '$current_genre_id'";
                            $run2 = mysqli_query($connect, $query2);
                            $row2 = mysqli_fetch_array($run2);
                            if(isset($_GET['clear'])){?>
                                 <option  value="0"></option>
                            <?php } ?>
                                <option  value="<?php echo $row2['genre_id']?>"><?php echo $row2['genre']?></option>
                                <?php
                                // Put Items in Array
                                while ($row = mysqli_fetch_array($run)) {
                                    if($row["genre_id"]!==$current_genre_id){?>
                                    <!-- Display All genre ID and genre Type -->
                                    <option value="<?php echo $row["genre_id"] ?>"><?php echo $row["genre"] ?></option>

                                <?php }} ?>
                
                        </select>
                        <!--- Creating Button For Filter and Clear Filter --->
                        <div class="button">
                            <button type="submit" name="filter" class="filter_btn">Filter</button>
                            <button type="submit" name="clear" value = "0" class="filter_btn">Clear</button>
                        </div>
                    </div>
                </form>
                <!--- Filter Form End --->
            </section>


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


            <!--- Product and Pagination Section Start --->
            <section>
                <div class="product">

                    <?php
                    // Include Pagination File (For Display Products and Product per Page)
                    include_once 'Functions/product_pagination_filter.php';

                    // Set i value
                    $i = 0;
                    while ($row = mysqli_fetch_array($run)) {
                        // If i modulo is 0, Echo New Div
                        if ($i % 3 == 0) {
                            echo "<div class='row'>";
                        }
                        // if ($row['quantity']==0){
                        //     echo "<div class='column'>
                        //     <a href='productpg.php?id={$row['genre_id']}'>
                        //     <img src='images/{$row['image']}' alt='book' class='product_image'>
                        //     <h2>Out Of Stock</h2>
                        //     </a>
                        //     </div>";}
                         
                     
                        // Display Product if i modulo is not 0 or 3
                        echo "<div class='column'>
                        <a href='productpg.php?id={$row['book_id']}'>
                        <img src='images/{$row['image']}' alt='book' class='product_image'>
                        <h3>{$row['name']}</h3>
                        <h5>{$row['author']}<h5>
                        
                        <h3>RM{$row['price']}</h3>
                        </a>
                        </div>";
       
                        
                        // If i modulo is 0, Echo End Div
                        if ($i % 3 == 2) {
                            echo "</div>";
                        }
                        // Loop i
                        $i++;
                    }
                    ?>

                </div>
                <div class="pagination">

                    <?php
                    // Display Page Numbers
                    for ($pages = 1; $pages <= $pages_num; $pages++) {
                        if($pages == $page){
                            echo '<div class="page_box"><a class="selected_pg">' . $page . '   </a></div>';
                        }
                        // if apply filter functions, then the page numbers will redirect to relevant page
                        elseif(isset($filter)) {
                            echo '<p><a href="product.php?page=' . $pages . '&p_category=' . $filter . '&filter=' . '">' . $pages . '</a></p>';
                        }
                        else {
                            echo '<p><a href="product.php?page=' . $pages . '">' . $pages . '</a></p>';
                        }
                    }

                    // for ($page_list = 1; $page_list <= $pages_num; $page_list++) {
                    //     if ($page_list == $page) {
                    //         echo '<div class="page_box"><a class="selected_pg">' . $page . '   </a></div>';
                    //     }
                        
                    //     elseif(isset($sort)){
                    //         echo '<p><a href="dashboard.php?page=' . $page_list . "&sort=" . $sort . "&search=&sort_item=" . '">' . $page_list . '</a></p>';
                    //     }

                    //     else {
                    //         echo '<p><a href="dashboard.php?page=' . $page_list . '">' . $page_list . '</a></p>';
                    //     }
                    // }           

                    
                    ?>

                </div>
            </section>
        </div>
        <!--- Pagination Section End --->
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
    </script>
    <!--- Javascript Start End--->


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

</body>
</html>