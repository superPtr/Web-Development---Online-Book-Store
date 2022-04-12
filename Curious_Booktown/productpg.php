<?php
// Start Session
session_start();

// Include Product Description File (For Display Product Information)
include "Functions/product_desc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CuriousBooktown | Product</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="CSS/productpg.css">
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
                <!--- Items on NavPanel --->
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="product.php">Products</a></li>

                    <!--- Check Session Start --->
                    <?php
                    // If User Log In to the Website
                    if (isset($_SESSION['login_user'])) { ?>

                        <!--- Display Items --->
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="Functions/logout.php">Log Out</a></li>
                        <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>

                        <!--- If User is Not Log In to the Website --->
                    <?php } else { ?>

                        <!--- Display Items --->
                        <li><a href="cust_login.php">Log In/Sign Up</a></li>
                    <?php } ?>
                    <!--- Check Session End --->
                </ul>
            </div>
            <div class="menu_button">
                <i class="fas fa-bars" style="font-size: 30px;" onclick="showPanel()"></i>
            </div>
        </nav>
    </header>
    <!--- Creating Navigational Panel End--->


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <!--- Product Section Start --->
    <main>
        <div class="container">
            <!--- Product Information Start --->
            <div class="product">
                <img src="Images/<?php echo $image ?>" alt="">
            </div>
            <div class="product_details">
                <div class="p_name">
                    <!--- Display Product Information --->
                    <h2 class="brand"><?php echo $name ?></h2>
                    <p><?php echo $genre ?></p>
                    <h3 class="name"><?php echo $author ?></h3>
                    <hr>
                    <h3 class="stock"><?php echo 'In Stock: ' . $quantity ?></h3>
                    <h3 class="price"><?php echo 'RM' . $price ?></h3>
                </div>
                <!--- Product Information End --->

                <!--- Form for User to Add to Cart Start --->
                <form action="Functions/add_cart.php" method="POST">
                    <div class="form">
                        <div class="amount">
                            <label><b>Amount: </b></label>
                            <!--- Input for User to Select Product Amount --->
                            <input type="number" name="amount" class="input" min="1" max="10" value="1">
                            <input type="hidden" name="book_id" value="<?php echo $id ?>">
                        </div>
                        <!--- Button for User to Submit Form --->
                        <div class="add_btn">
                            <button type="submit" name="add_to_cart">Add to Cart</button>
                        </div>
                    </div>
                </form>
                <!--- Form for User to Add to Cart End --->
            </div>
        </div>

        <hr class="break">

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


        <!--- Product Description Start --->
        <div class="details">
            <div class="title">
                <h2><u>Information</u></h2>
            </div>
            <!--- Publisher--->
            <div class="content">                
                <h3>Publisher:</h3>
                <p><?php echo $publisher ?>
                </p>
            </div>
            <!--- Publication date --->
            <div class="content">
                <h3>Publication date:</h3>
                <p><?php echo $pb_date ?>
                </p>
            </div>
            <!--- author --->
            <div class="content">
                <h3>Author:</h3>
                <p><?php echo $author ?>
                </p>
            </div>
            <!--- description --->
            <div class="content">
                <h3>Description:</h3>
                <p><?php echo $desc ?>
                </p>
            </div>

            
        </div>
        <!--- Product Description End --->
    </main>
    <!--- Product Section End --->


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <!--- Footer Start --->
    <?php include "footer.php" ?>
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
    <!--- Javascript End --->


    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

</body>
</html>