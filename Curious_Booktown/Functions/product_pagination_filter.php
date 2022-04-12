<?php
// Start ---- Finding the Default Number of Page when User Did Not Click Filter or Clear and Set Number of Product per Page

// Set Number of Product per Page
$item_per_page = 12;

// SQL Query to Get All Products
$query = "SELECT *FROM book";
$run = mysqli_query($connect, $query);

// Calculate Number of Rows in Database (Number of Products)
$total_product = mysqli_num_rows($run);

// Total Number of Page for Pagination
// Number of Rows in Database divide Number of Product per Page
$pages_num = ceil($total_product/$item_per_page);

// Set Page Value as Default(1) if User Did not Select which Page
if (!isset($_GET['page'])) {
$page = 1;

// If User Select a Page, Redirect to that Page
} else {
$page = $_GET['page'];
}

// Calculate the Starting Item in the Database
$item_start = ($page - 1) * $item_per_page;

// SQL Query to Display 12 Items per Page
$query = "SELECT *FROM book LIMIT " . $item_start . ',' . $item_per_page;
$run = mysqli_query($connect, $query);

// End ---- Finding the Default Number of Page when User Did Not Click Filter or Clear and Set Number of Product per Page


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// Start ---- Finding the Default Number of Page when User Click Filter or Clear and Set Number of Product per Page

// If User Filter Product Category
if(isset($_GET["filter"])){
// Set Number of Product per Page
$item_per_page = 12;

// Get Filter Category Input Value
$filter = $_GET["p_category"];

if ($filter == 0){
    $query = "SELECT *FROM book LIMIT " . $item_start . ',' . $item_per_page;
    $run = mysqli_query($connect, $query);
}else{
    // Calculate Number of Rows in Database (Number of Products)
    $query = "SELECT *FROM book WHERE genre_id = '$filter'";
    $run = mysqli_query($connect, $query);

    // Calculate Number of Rows in Database (Number of Products)
    $total_product = mysqli_num_rows($run);

    // Total Number of Page for Pagination
    // Number of Rows in Database divide Number of Product per Page
    $pages_num = ceil($total_product/$item_per_page);

    // Get the Starting Product to Display per Page
    $item_start = ($page - 1) * $item_per_page;

    // SQL Query to Display 12 Items per Page
    $query = "SELECT *FROM book WHERE genre_id = '$filter' LIMIT " . $item_start . ',' . $item_per_page;
    $run = mysqli_query($connect, $query);
}}

// If User Clear Filtered Product Category
if(isset($_GET["clear"])){
// SQL Query to Display 12 Items per Page
$query = "SELECT *FROM book LIMIT " . $item_start . ',' . $item_per_page;
$run = mysqli_query($connect, $query);

}

// End ---- Finding the Default Number of Page when User Click Filter or Clear and Set Number of Product per Page
?>