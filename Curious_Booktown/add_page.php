<?php
//Create Add Product Function into Website
include "Functions/add_product.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Update</title>

    <!--- External CSS --->
    <link rel="stylesheet" href="CSS/update.css">

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
   <div class="back">
        <a href="dashboard.php">Back</a>
    </div>
    <!----Back button for admin back to dashboard end---->

    <div class="container">
        <!--- Creating Form For Admin to Add/Update Product Start --->
        <form method="POST" enctype="multipart/form-data">
            <div class="content">
                <!--- Name Input Field --->
                <label>Name</label><br>
                <input type="text" class="input" placeholder="Enter Product Name" name="p_name" autocomplete="off">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["p_name"])) echo $error["p_name"]?>
            </div>

            <div class="content">
                <!--- Image Input Field --->
                <label>Image</label><br>
                <input type="file" class="input" name="image" autocomplete="off">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["image"])) echo $error["image"]; elseif(isset($error["image2"])) echo $error["image2"]?>
            </div>

            <div class="content">
                <!--- Category Input Field --->
                <label>Category</label><br>
                <!--- Input Options For Users --->
                <select name="category" class="input">
                    <?php
                    // SQL Query (Get Category Items)
                    $query = "SELECT *FROM category";
                    $run = mysqli_query($connect, $query);
                    // Put Items in Array
                    while ($row = mysqli_fetch_array($run)){
                    ?>
                    <!--- Display All Items in Category Table --->
                    <option value="<?php echo $row["category_id"] ?>"><?php echo $row["category"] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["category"])) echo $error["category"] ?>
            </div>

            <div class="content">
                <!--- Brand Input Field --->
                <label>Brand</label><br>
                <input type="text" class="input" placeholder="Enter Product Brand" name="brand" autocomplete="off">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["brand"])) echo $error["brand"]; elseif(isset($error["brand2"])) echo $error["brand2"] ?>
            </div>

            <div class="content">
                <!--- Price Input Field --->
                <label>Price</label><br>
                <input type="text" class="input" placeholder="Enter Product Price" name="price" autocomplete="off">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["price"])) echo $error["price"]; elseif(isset($error["price2"])) echo $error["price2"] ?>
            </div>

            <div class="content">
                <!--- Quantity Input Field --->
                <label>Quantity</label><br>
                <input type="text" class="input" placeholder="Enter Product Quantity" name="qty" autocomplete="off">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["qty"])) echo $error["qty"]; elseif(isset($error["qty2"])) echo $error["qty2"] ?>
            </div>

            <div class="content">
                <!--- Features Input Field --->
                <label>Features</label><br>
                <input type="text" class="input" placeholder="Enter Product Features" name="features" autocomplete="off">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["features"])) echo $error["features"] ?>
            </div>

            <div class="content">
                <!--- Ingredients Input Field --->
                <label>Ingredients</label><br>
                <input type="text" class="input" placeholder="Enter Product Ingredients" name="ingredients" autocomplete="off">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["ingredients"])) echo $error["ingredients"] ?>
            </div>

            <div class="content">
                <!--- Nutrients Input Field --->
                <label>Nutrients</label><br>
                <input type="text" class="input" placeholder="Enter Product Nutrients" name="nutrients" autocomplete="off">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["nutrients"])) echo $error["nutrients"] ?>
            </div>

            <!--- Save Button --->
            <button type="submit" name="submit">Save</button>
        </form>
        <!--- Creating Form For Admin to Add/Update Product End --->
    </div>

</body>
</html>