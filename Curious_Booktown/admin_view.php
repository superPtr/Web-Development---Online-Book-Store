<?php
// Include Product Description File
include "Functions/product_desc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CuriousBooktown | Product_View</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="CSS/productpg.css">
    <link rel="stylesheet" href="CSS/admin_view.css">
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


    <!---- Back button for admin back to dashboard start---->
    <button onclick="window.location.href='dashboard.php'" class="close_button">X</button>
    <!----Back button for admin back to dashboard end---->

    <!--- Admin View Products in Customer View Start --->
    <main>
        <div class="container">
            <!--- Product Information Start --->
            <div class="product">
                <img src="Images/<?php echo $image ?>" alt="">
            </div>
            <div class="product_details">
                <div class="p_name">
                    <!--- Display Product Information --->
                    <h2 class="brand"><?php echo $author ?></h2>
                    <p><?php echo $genre ?></p>
                    <h3 class="name"><?php echo $name ?></h3>
                    <hr>
                    <h3 class="stock"><?php echo 'In Stock: ' . $quantity ?></h3>
                    <h3 class="price"><?php echo 'RM' . $price ?></h3>
                </div>
                <!--- Product Information End --->

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
    <!--- Admin View Products in Customer View End --->


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

</body>
</html>
