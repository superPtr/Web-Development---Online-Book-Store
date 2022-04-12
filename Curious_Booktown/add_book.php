<?php
//Create Add Product Function into Website
include "Functions/addBook.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>

    <!--- External CSS --->
    <link rel="stylesheet" href="CSS/admin_add_book.css">

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

    <div class="container">
    <button onclick="window.location.href='dashboard.php'" class="close_button">X</button>
        <!--- Creating Form For Admin to Add/Update Product Start --->
        <form method="POST" enctype="multipart/form-data">
            <div class="content">
                <!--- Name Input Field --->
                <label>Name</label><br>
                <input type="text" class="input" placeholder="Enter Book Name" name="b_name" autocomplete="off" value="<?php if(isset($_POST['b_name'])){echo $_POST['b_name'];}?>">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["b_name"])) echo $error["b_name"]?>
            </div>

            <div class="content">
                <!--- Image Input Field --->
                <label>Image</label><br>
                <input type="file" class="input" name="image" autocomplete="off" >
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["image"])) echo $error["image"]; elseif(isset($error["image2"])) echo $error["image2"]?>
            </div>

            <div class="content">
                <!--- Category Input Field --->
                <label>Genre</label><br>
                <!--- Input Options For Users --->
                <select name="genre" class="input">
                    <option value="">Select Book Genre</option>
                    <?php
                    // SQL Query (Get Category Items)
                    $query = "SELECT *FROM genre";
                    $run = mysqli_query($connect, $query);
                    // Put Items in Array
                    while ($row = mysqli_fetch_array($run)){
                    ?>
                    <!--- Display All Items in Category Table --->
                    <option value="<?php echo $row["genre_id"] ?>"><?php echo $row["genre"] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["genre"])) echo $error["genre"] ?>
            </div>

            <div class="content">
                <!--- Brand Input Field --->
                <label>Author</label><br>
                <input type="text" class="input" placeholder="Enter Book Author" name="author" autocomplete="off"  value="<?php if(isset($_POST['author'])){echo $_POST['author'];}?>">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["author"])) echo $error["author"]; elseif(isset($error["author2"])) echo $error["author2"] ?>
            </div>

            <div class="content">
                <!--- Quantity Input Field --->
                <label>Publisher</label><br>
                <input type="text" class="input" placeholder="Enter Book Publisher" name="publisher" autocomplete="off"  value="<?php if(isset($_POST['publisher'])){echo $_POST['publisher'];}?>">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["publisher"])) echo $error["publisher"] ?>
            </div>

            <div class="content">
                <!--- Quantity Input Field --->
                <label>Publication Date</label><br>
                <input type="date" class="input" placeholder="Enter Book Publication Date" name="pub_date" autocomplete="off"  value="<?php if(isset($_POST['pub_date'])){echo $_POST['pub_date'];}?>">
                  <!--- Print Out Text in Array --->
                <?php  if(isset($error["pub_date"])) echo $error["pub_date"] ?>
            </div>

            <div class="content">
                <!--- Price Input Field --->
                <label>Price</label><br>
                <input type="text" class="input" placeholder="Enter Book Price" name="price" autocomplete="off"  value="<?php if(isset($_POST['price'])){echo $_POST['price'];}?>">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["price"])) echo $error["price"]; elseif(isset($error["price2"])) echo $error["price2"] ?>
            </div>         

            <div class="content">
                <!--- Features Input Field --->
                <label>Description</label><br>
                <input type="text" class="input" placeholder="Enter Book Description" name="description" autocomplete="off"  value="<?php if(isset($_POST['description'])){echo $_POST['description'];}?>">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["description"])) echo $error["description"] ?>
            </div>

            <!--- Save Button --->
            <button type="submit" name="submit" class="submit_button">Save</button>
        </form>
        <!--- Creating Form For Admin to Add/Update Product End --->
    </div>

</body>
</html>