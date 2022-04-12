<?php
// Start ---- Product History Pagination and Display User Purchase History

// Set Number of Product per Page
$item_per_page = 5;

// // SQL Query to Get All User Purchase History
$user = $_SESSION['login_user'];
$query = "SELECT *FROM history WHERE CustID = '$userid'";
$run = mysqli_query($connect, $query);

// // Calculate Number of Rows in Database (Number of Rows in User Purchase History)
$total_product = mysqli_num_rows($run);

// // Total Number of Page for Pagination
// // Number of Rows in Database divide Number of Product per Page
$pages_num = ceil($total_product/$item_per_page);

// // Set Page Value as Default(1) if User Did not Select which Page
if (!isset($_GET['page'])) {
$page = 1;
// If User Select a Page, Redirect to that Page
} else {
$page = $_GET['page'];
}

// Calculate the Starting Item in the Database
$item_start = ($page - 1) * $item_per_page;

// SQL Query to Display 5 Items per Page
/*$query = "SELECT book.image, book.author, book.name, history.total_price,history.r_date 
FROM (((book 
INNER JOIN stock ON book.book_id = stock.book_id )
INNER JOIN bill ON bill.serial_number = stock.serial_number)
INNER JOIN history ON history.history_id = bill.history_id)
WHERE history.CustID = '$userid' ORDER BY r_date DESC LIMIT " . $item_start . ',' . $item_per_page;
$run = mysqli_query($connect, $query);*/

$query = "SELECT history_id, total_price, r_date FROM history WHERE CustID = '$userid' ORDER BY r_date DESC LIMIT " . $item_start . ',' . $item_per_page;
$run = mysqli_query($connect, $query);

//Calculate Number of Rows in User Purchase History
$count = mysqli_num_rows($run);

?>