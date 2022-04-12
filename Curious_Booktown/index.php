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
    <title>CuriousBooktown</title>

    <!--- External CSS --->
    <link rel="stylesheet" href="css/index.css">
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

    <!--- Creating Landing Page Start--->
    <header class="landing_page">
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

        <!--- Text on Landing Page Start--->
        <div class="home_text">
            <!--- PHP Check Session Start --->
            <?php
            //If user log in to the website
            if (isset($_SESSION['login_user'])) { ?>
                <!--- Display welcome message for the user at the landing page  --->
                <span class="text_0">Hi, <i><?php echo $_SESSION['login_user'] ?></i></span>
            <?php }?>
                <span class="text_1">Welcome to</span>
                <span class="text_2">Curious Booktown</span>
            <!--- PHP Check Session End --->
        </div>
        <!--- Text on Landing Page End--->
    </header>
    <!--- Creating Landing Page End--->


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <main>
        <!--- About Us Section Start--->
        <section class="about">
            <div class="title">
                <h1>About Us</h1>
                <div class="border">
                    <!--- About Us Content Start--->
                    <div class="text">
                        <p>Curious Booktown is a online bookstore which sells many categories of book. The wide scope of books offered by us incorporates fantasy, mystery, romance, horror, science fiction, adventure and some more. Every one of these books is accessible in English.
                            The point of Curious Booktown is to give significant, charming, and also animating substance to youngsters that go much past their normal course books. With this point in view, we treat each book as a work of adoration. Every one of our books is broadly examined, attentively composed, and delightfully planned.
                            The mission of Curious Booktown is to provide value products and quality services to our customers, a pleasant working environment for people, and to be a good corporate citizen.
                            Our vision is to serve our people, to grow with our society and to manually benefit from the world and become the best online bookstore in Southeast Asia.</p>
                    <!-- <div class="list">
                        <p>1. Dress your dog up with our range of trendy and comfortable dog accessories.</p>
                        <p>2. Keep them entertained and play with them with our safe and interactive dog toys.</p>
                        <p>3. Search from our range of healthy and nutritious dog food for their meals.</p>
                    </div> -->
                    <!--- About Us Content End--->
                </div>
            </div>
        </section>
        <!--- About Us Section End --->


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


        <!--- Products Section Start --->
        <section class="products">
            <div class="title">
                <h1>Latest Products</h1>
            </div>
            <div class="row">

                <!--- Display Latest Products Start --->
                <?php
                // Read Items in Database
                // SQL Query to Get 4 Products
                $query = "SELECT * FROM book ORDER BY register_date DESC LIMIT 4;";
                $run = mysqli_query($connect, $query);

                // Put Items in Array
                while ($row = mysqli_fetch_array($run)) {
                ?>
                    <!--- Product Content Start --->
                    <div class="column">
                        <a href="productpg.php?id=<?php echo $row["book_id"] ?>">
                            <div class="container">
                                <!-- Print Out Item In Array -->
                                <img src="images/<?php echo $row["image"] ?>" alt="Book Image" class="product_image">
                                <h3><?php echo $row["name"] ?></h3>
                                <h5><?php echo $row["author"] ?><h5>
                                
                                <h3><?php echo "RM" . $row["price"] ?></h3>
                            </div>
                        </a>
                    </div>
                    <!--- Product Content End --->
                <?php } ?>
                <!--- Display Latest Products End --->

            </div>
            <!--- Creating a Button --->
            <div class="browse">
                <a href="product.php">View More</a>
            </div>
            <div class="title">
                <h1>Trending Products</h1>
            </div>
            <div class="row">

                <!--- Display Trending Products Start --->
                <?php
                // Read Items in Database
                // SQL Query to Get 4 Products
                $query = "SELECT * FROM book ORDER BY price DESC LIMIT 4;";
                $run = mysqli_query($connect, $query);

                // Put Items in Array
                while ($row = mysqli_fetch_array($run)) {
                ?>
                    <!--- Product Content Start --->
                    <div class="column" id = "trending">
                        <a href="productpg.php?id=<?php echo $row["book_id"] ?>">
                            <div class="container">
                                <!-- Print Out Item In Array -->
                                <img src="images/<?php echo $row["image"] ?>" alt="Book Image" class="product_image">
                                <h3><?php echo $row["name"] ?></h3>
                                <h5><?php echo $row["author"] ?><h5>
                                
                                <h3><?php echo "RM" . $row["price"] ?></h3>
                            </div>
                        </a>
                    </div>
                    <!--- Product Content End --->
                <?php } ?>
                <!--- Display Trending Products End --->

            </div>
            <!--- Creating a Button --->
            <div class="browse">
                <a href="product.php">View More</a>
            </div>








        </section>
        <!--- Products Section End --->
        <br><br>
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
    <!--- Javascript End--->


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

</body>
</html>