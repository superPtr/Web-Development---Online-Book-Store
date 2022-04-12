<?php
//Create Add Product Function into Website
include_once "Functions/update_product.php";
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
                <!--- Display Item In Database using 'Value' --->
                <input type="text" class="input" name="p_name" autocomplete="off" value="<?php echo $name ?>">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["p_name"])) echo $error["p_name"]?>
            </div>

            <div class="content">
                <!--- Image Input Field --->
                <label>Image</label><br>
                <!--- Display Item In Database using 'p' --->
                <input type="file" class="input" name="image" autocomplete="off">
                <!--- Set Input Field as Current Image --->
                <input type="hidden" class="input" name="delete_img" value="<?php echo $image?>">
                <p>Current Image In Database: <?php echo $image?></p>
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["image"])) echo $error["image"]; elseif(isset($error["image2"])) echo $error["image2"]?>
            </div>

            <div class="content">
                <!--- Genre Input Field --->
                <label>Genre</label><br>
                <!--- Input Options For Users --->
                <select name="genre" class="input">
                    <option value="<?php echo $genre_id?>"><?php echo $genre?></option>
                    <?php $current_genre_id = $genre_id; ?>
                    <?php
                    // SQL Query (Get Category Items)
                    $query = "SELECT *FROM genre";
                    $run = mysqli_query($connect, $query);
                    // Put Items in Array
                    while ($row = mysqli_fetch_array($run)){
                    ?>
                    <?php if ($current_genre_id !== $row["genre_id"]){?>
                    <!--- Display All Items in Genre Table --->
                    <option value="<?php echo $row["genre_id"] ?>"><?php echo $row["genre"] ?></option>
                    <?php } ?>
                    <?php
                    }
                    ?>
                    
                </select>
                <!--- Print Out Text in Array --->
                <!-- <?php  if(isset($error["genre"])) echo $error["genre"]?> -->
            </div>

            <div class="content">
                <!--- Brand Input Field --->
                <label>Author</label><br>
                <!--- Display Item In Database using 'Value' --->
                <input type="text" class="input" placeholder="Enter Book Author" name="author" autocomplete="off" value="<?php echo $author ?>">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["author"])) echo $error["author"]; elseif(isset($error["author2"])) echo $error["author2"] ?>
            </div>

            <div class="content">
                <!--- Price Input Field --->
                <label>Price</label><br>
                <!--- Display Item In Database using 'Value' --->
                <input type="text" class="input" placeholder="Enter Book Price" name="price" autocomplete="off" value="<?php echo $price ?>">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["price"])) echo $error["price"]; elseif(isset($error["price2"])) echo $error["price2"] ?>
            </div>


            <div class="content">
                <!--- Features Input Field --->
                <label>Description</label><br>
                <!--- Display Item In Database using 'Value' --->
                <input type="text" class="input" placeholder="Enter Description" name="desc" autocomplete="off" value="<?php echo $desc ?>">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["desc"])) echo $error["desc"] ?>
            </div>


            <!--- Save Button --->
            <button type="submit" name="update">Update</button>
        </form>
        <!--- Creating Form For Admin to Add/Update Product End --->
    </div>

</body>
</html>
