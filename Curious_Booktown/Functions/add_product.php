<?php
// Create Connection to Database --- Start
include_once "connection.php";
// Create Connection to Database --- End


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// When Click Save Button (Add Item Into Database) --- Start
if(isset($_POST["submit"])){
    $name = $_POST["p_name"];
    $category = $_POST["category"];
    $brand = $_POST["brand"];
    $price = $_POST["price"];
    $qty = $_POST["qty"];
    $features = $_POST["features"];
    $ingredients = $_POST["ingredients"];
    $nutrients = $_POST["nutrients"];
    // Upload File Name to Database
    $img_name = $_FILES["image"]["name"];
    $tmp_img_name = $_FILES["image"]["tmp_name"];
    // File Directory Location to Store Image
    $location = "Images/" . $img_name;

    // Checking Empty Inputs (Form Validation)
    $error = array();

    // If Empty Input Detected, Text Will Stored in Array
    // Input Field Name Validation
    if(empty($name)){
        $error["p_name"] = "<p><font color=red> Product Name Required! </font></p>";
    }

    // Input Field Image Validation
    if(empty($img_name)){
        $error["image"] = "<p><font color=red> Product Image Required! </font></p>";
    }

    $query = "SELECT image FROM product WHERE image = '$img_name'";
    $run = mysqli_query($connect, $query);
    if(mysqli_num_rows($run) > 0){
        $error["image2"] = "<p><font color=red> Product Image Exist! </font></p>";
    }

    // Input Field Category Validation
    if(empty($category)){
        $error["category"] = "<p><font color=red> Product Category Required! 
        </font></p>";
    }

    // Input Field Brand Validation
    if(empty($brand)){
        $error["brand"] = "<p><font color=red> Product Brand Required! </font></p>";
    }
    if(!preg_match("/^[a-zA-Z\s]+$/", $_POST["brand"])){
        $error["brand2"] = "<p><font color=red> Letters Only! </font></p>";
    }

    // Input Field Price Validation
    if(empty($price)){
        $error["price"] = "<p><font color=red> Product Price Required! </font></p>";
    }
    if(!preg_match("/^[0-9\.]+$/", $_POST["price"])){
        $error["price2"] = "<p><font color=red> Numbers Only: xxx.xx! </font></p>";
    }

    // Input Field Quantity Validation
    if(empty($qty)){
        $error["qty"] = "<p><font color=red> Product Quantity Required! </font></p>";
    }
    if(!preg_match("/^[0-9\.]+$/", $_POST["qty"])){
        $error["qty2"] = "<p><font color=red> Numbers Only! </font></p>";
    }

    // Input Field Features, Ingredients and Nutrients Validation
    if(empty($features)){
        $error["features"] = "<p><font color=red> Product Features Required! </font></p>";
    }
    if(empty($ingredients)){
        $error["ingredients"] = "<p><font color=red> Product Ingredients Required! </font></p>";
    }
    if(empty($nutrients)){
        $error["nutrients"] = "<p><font color=red> Product Nutrients Required! </font></p>";
    }

    // If No Items in Array, Insert Data into Database
    if(count($error) == 0) {
        // Add Item Into Database
        // SQL Query to insert Items into Database
        $query = "INSERT INTO product (name, image, category_id, brand, price, quantity, features, 
        ingredients, nutrients, r_date)VALUES('$name', '$img_name', '$category', '$brand', '$price', 
        '$qty', '$features', '$ingredients', '$nutrients', now())";
        mysqli_query($connect, $query);
        // Upload Image File to FIle Directory
        move_uploaded_file($tmp_img_name, $location);
        header("location:dashboard.php");
    }
}
// When Click Save Button (Add Item Into Database) --- End


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

?>