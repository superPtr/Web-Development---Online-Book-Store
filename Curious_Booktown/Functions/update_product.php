<?php
    // Create Connection to Database --- Start
    include_once "connection.php";
    // Create Connection to Database --- End


    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    // When Click Update Button (Search Item ID and Display In Website) --- Start
    if(isset($_POST["update1"])){
        $id = $_POST["update1"];
        // Search Items Based On ID
        // SQL Query
        $query = "SELECT *FROM book INNER JOIN genre ON 
        book.genre_id = genre.genre_id WHERE book_id = $id";
        $run = mysqli_query($connect, $query);
        // Put Items in Array
        while($row = mysqli_fetch_array($run)) {
            $name = $row["name"];
            $image = $row['image'];
            $genre_id = $row["genre_id"];
            $genre = $row["genre"];
            $author = $row["author"];
            $price = $row["price"];
            $desc = $row["description"];
            $id = $row["book_id"];
        }
    }
    // When Click Update Button (Search Item ID and Display In Website) --- End


    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    // When Click Update Button (Update Item Into Database) --- Start
    if(isset($_POST["update"])){
        $id = $_POST["update"];
        $name = $_POST["p_name"];
        $image = $_POST["delete_img"];
        $genre_id = $_POST["genre"];
        $author = $_POST["author"];
        $price = $_POST["price"];
        $desc = $_POST["desc"];
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

        // Input Field Author Validation
        if(empty($author)){
            $error["author"] = "<p><font color=red> Author Name Required! </font></p>";
        }

        if(!preg_match("/^[a-zA-Z\s.]+$/", $_POST["author"])){
            $error["author2"] = "<p><font color=red> Letters and Dots Only! </font></p>";
        }

        // Input Field Price Validation
        if(empty($price)){
            $error["price"] = "<p><font color=red> Product Price Required! </font></p>";
        }
        
        if(!preg_match("/^[0-9\.]+$/", $_POST["price"])){
            $error["price2"] = "<p><font color=red> Numbers Only: xxx.xx! </font></p>";
        }

        
        // Input Field Features, Ingredients and Nutrients Validation
        if(empty($desc)){
            $error["description"] = "<p><font color=red> Description Required! </font></p>";
        }

        // If No Items in Array, Insert Data into Database
        if(count($error) == 0) {

            // Update Database
            // If $img_name Is Empty (I'm Not Updating the Image)
            if(empty($img_name)){
                // SQL Query (Without Image Field)
                $query = "UPDATE book SET `name` = '$name', genre_id = '$genre_id', author = '$author', 
                price = '$price',  `description` = '$desc' WHERE book_id = '$id'";
                $run = mysqli_query($connect, $query);
                if($run){

                }else{
                    echo mysqli_error($connect);
                }
            }
            // If $img_name Is Not Empty (I'm  Updating the Image)
            else{
                // SQL Query (With Image Field)
                $query = "UPDATE book SET name = '$name', image = '$img_name', genre_id = '$genre_id', author = '$author', 
                price = '$price', `description` = '$desc' WHERE book_id = '$id'";
                $run2 = mysqli_query($connect, $query);
                if($run2){
                    echo "<script type='text/javascript'> 
                    alert('success with image');
                    </script>";
                }else{
                    echo mysqli_error($connect);
                }
                // Remove Old Image From File Directory
                unlink("Images/$image");
                //Upload New Image to File Directory
                move_uploaded_file($tmp_img_name, $location);
            }
            echo mysqli_error($connect);
            echo "<script type='text/javascript'>
            alert('Product Updated!!!');
        
            </script>";
        }else{
            foreach($error as $errors){
                echo $errors."\n";
            }
            echo "<script type='text/javascript'> 
            alert('no success');
            </script>";
        }
    
}
    // When Click Update Button (Update Item Into Database) --- End
?>