<?php
// Create Connection to Database --- Start
include_once "connection.php";
// Create Connection to Database --- End


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// When Click Save Button (Add Item Into Database) --- Start
if(isset($_POST["submit"])){
    $name = $_POST["b_name"];
    $genre = $_POST["genre"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $pub_date = $_POST["pub_date"];
    $publisher = $_POST["publisher"];
    $price = $_POST["price"];
    $description = $_POST["description"];
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
        $error["b_name"] = "<p><font color=red> Book Name Required! </font></p>";
    }

    // Input Field Image Validation
    if(empty($img_name)){
        $error["image"] = "<p><font color=red> Book Image Required! </font></p>";
    }

    $query = "SELECT image FROM book WHERE image = '$img_name'";
    $run = mysqli_query($connect, $query);
    if(mysqli_num_rows($run) > 0){
        $error["image2"] = "<p><font color=red> Book Image Exist! </font></p>";
    }

    // Input Field genre Validation
    if(empty($genre)){
        $error["genre"] = "<p><font color=red> Book Genre Required! 
        </font></p>";
    }

    // Input Field author Validation
    if(empty($author)){
        $error["author"] = "<p><font color=red> Book Author Required! </font></p>";
    }
    if(!preg_match("/^[a-zA-Z\s]+$/", $_POST["author"])){
        $error["author2"] = "<p><font color=red> Letters Only! </font></p>";
    }

    // Input Field publisher Validation
    if(empty($publisher)){
        $error["publisher"] = "<p><font color=red> Product Publisher Required! </font></p>";
    }

    // Input Field Publication Date Validation
    if(empty($pub_date)){
        $error["pub_date"] = "<p><font color=red> Book Publication Date Required! </font></p>";
    }

    // Input Field Price Validation
    if(empty($price)){
        $error["price"] = "<p><font color=red> Book Price Required! </font></p>";
    }
    if(!preg_match("/^[0-9\.]+$/", $_POST["price"])){
        $error["price2"] = "<p><font color=red> Numbers Only: xxx.xx! </font></p>";
    }

    if(empty($description)){
        $error["description"] = "<p><font color=red> Book Description Required! </font></p>";
    }

    // If No Items in Array, Insert Data into Database
    if(count($error) == 0) {
        // Add Item Into Database
        // SQL Query to insert Items into Database
        $query = "INSERT INTO book (`name`, `image`, genre_id, author, publisher, publication_date, price, 
        `description`, register_date)VALUES('$name', '$img_name', '$genre', '$author', '$publisher',
        '$pub_date', '$price', '$description', now())";
        mysqli_query($connect, $query);
        // Upload Image File to FIle Directory
        move_uploaded_file($tmp_img_name, $location);
        echo "<script type='text/javascript'>
        alert('New Book Added!!!');
        window.location='dashboard.php';
        </script>";
    }
    
}
// When Click Save Button (Add Item Into Database) --- End


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

?>