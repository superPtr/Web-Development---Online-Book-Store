<?php
// Create Connection to Database 
include "Functions/connection.php";


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// When Admin Click View Button in Admin_View Page or Customer Click Product in ProductPg (Search Item ID and Display In Website) --- Start
if(isset($_GET["id"])){
    $id = $_GET["id"];
    // Search Items Based On ID
    // SQL Query to Get Item
    $query = "SELECT *FROM book  INNER JOIN genre on book.genre_id = genre.genre_id WHERE book_id = $id";
    $run = mysqli_query($connect, $query);
    
    // Put Items in Array
    while($row = mysqli_fetch_array($run)) {
        $id = $row['book_id'];
        $name = $row["name"];
        $image = $row['image'];
        $genre = $row["genre"];
        $author = $row["author"];
        $price = $row["price"];
        // $qty = $row["quantity"];
        $desc = $row["description"];
        $publisher = $row["publisher"];
        $pb_date = $row["publication_date"];
        // $ingredients = $row["ingredients"];
        // $nutrients = $row["nutrients"];
    }

    $query = "SELECT * FROM stock INNER JOIN book on book.book_id = stock.book_id WHERE book_status = 'available' and stock.book_id = $id";
    $run = mysqli_query($connect, $query);
    $cnt = 0;
    while($row = mysqli_fetch_array($run)) {
        $cnt += 1;
    }
    $quantity = $cnt;

}
// When Click View Button (Search Item ID and Display In Website) --- End


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

?>