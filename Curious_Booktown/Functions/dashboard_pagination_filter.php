<?php

// Start ---- Finding the Default Number of Page when User Did Not Click Search or Clear and Set Number of Product per Page

// Set Number of Product per Page
$item_per_page = 10;

// SQL Query to Get All Products
$query = "SELECT *FROM book";
$run = mysqli_query($connect, $query);

// Calculate Number of Rows in Database (Number of Products)
$total_product = mysqli_num_rows($run);

// Total Number of Page for Pagination
// Number of Rows in Database divide Number of Product per Page
$pages_num = ceil($total_product / $item_per_page);

// Set Page Value as Default(1) if User Did not Select which Page
if (!isset($_GET['page'])) {
    $page = 1;

// If User Select a Page, Redirect to that Page
} else {
    $page = $_GET['page'];
}

// Calculate the Starting Item in the Database
$item_start = ($page - 1) * $item_per_page;

// SQL Query to Display 10 Items per Page
$query = "SELECT *FROM book LIMIT " . $item_start . ',' . $item_per_page;
$run = mysqli_query($connect, $query);

// End ---- Finding the Default Number of Page when User Did Not Click Filter or Clear and Set Number of Product per Page


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// Start ---- Finding the Default Number of Page when User Click Search or Clear and Set Number of Product per Page

// If Search Product
if (isset($_GET["search_item"])) {
    // Set Number of Product per Page
    $item_per_page = 10;

    // Get Search Input
    $search = $_GET['search'];

    if(empty($_GET['search'])){
        return false;
    }
    else{
    // Calculate Number of Rows in Database (Number of Products)
    $query = "SELECT *FROM book WHERE name LIKE '%$search%' OR name LIKE '%$search%'";
    $run = mysqli_query($connect, $query);

    // Calculate Number of Rows in Database (Number of Products)
    $total_product = mysqli_num_rows($run);

    // Total Number of Page for Pagination
    // Number of Rows in Database divide Number of Product per Page
    $pages_num = ceil($total_product / $item_per_page);

    // Get the Starting Product to Display per Page
    $item_start = ($page - 1) * $item_per_page;

    // SQL Query to Display 10 Items per Page
    $query = "SELECT *FROM book WHERE name LIKE '%$search%' OR name LIKE '%$search%'";
    $run = mysqli_query($connect, $query);
    }
}

// If User Clear Search Product
if (isset($_GET["clear"])) {
    // SQL Query to Display 10 Items per Page
    $query = "SELECT *FROM book LIMIT " . $item_start . ',' . $item_per_page;
    $run = mysqli_query($connect, $query);
}

// End ---- Finding the Default Number of Page when User Click Search or Clear and Set Number of Product per Page

if(isset($_GET["sort_item"])) {
    $sort = $_GET['sort'];
   
    if(empty($_GET['sort'])){
        return false;
    }
    if ($sort == 1) {
        $item_per_page = 10;

        // Calculate Number of Rows in Database (Number of Products)
        $query = "SELECT *FROM book";
        $run = mysqli_query($connect, $query);

        // Calculate Number of Rows in Database (Number of Products)
        $total_product = mysqli_num_rows($run);

        // Total Number of Page for Pagination
        // Number of Rows in Database divide Number of Product per Page
        $pages_num = ceil($total_product / $item_per_page);

        // Get the Starting Product to Display per Page
        $item_start = ($page - 1) * $item_per_page;

        $query = "SELECT *FROM book ORDER BY name ASC LIMIT " . $item_start . ',' . $item_per_page;
        $run = mysqli_query($connect, $query);
    }

    if($sort == 2){
        $item_per_page = 10;

        // Calculate Number of Rows in Database (Number of Products)
        $query = "SELECT *FROM book";
        $run = mysqli_query($connect, $query);

        // Calculate Number of Rows in Database (Number of Products)
        $total_product = mysqli_num_rows($run);

        // Total Number of Page for Pagination
        // Number of Rows in Database divide Number of Product per Page
        $pages_num = ceil($total_product / $item_per_page);

        // Get the Starting Product to Display per Page
        $item_start = ($page - 1) * $item_per_page;

        $query = "SELECT *FROM book ORDER BY name DESC LIMIT " . $item_start . ',' . $item_per_page;
        $run = mysqli_query($connect, $query);
    }

    if($sort == 3){
        $item_per_page = 10;

        // Calculate Number of Rows in Database (Number of Products)
        $query = "SELECT *FROM book";
        $run = mysqli_query($connect, $query);

        // Calculate Number of Rows in Database (Number of Products)
        $total_product = mysqli_num_rows($run);

        // Total Number of Page for Pagination
        // Number of Rows in Database divide Number of Product per Page
        $pages_num = ceil($total_product / $item_per_page);

        // Get the Starting Product to Display per Page
        $item_start = ($page - 1) * $item_per_page;

        $query = "SELECT *FROM book ORDER BY register_date ASC LIMIT " . $item_start . ',' . $item_per_page;
        $run = mysqli_query($connect, $query);
    }

    if($sort == 4){
        $item_per_page = 10;

        // Calculate Number of Rows in Database (Number of Products)
        $query = "SELECT *FROM book";
        $run = mysqli_query($connect, $query);

        // Calculate Number of Rows in Database (Number of Products)
        $total_product = mysqli_num_rows($run);

        // Total Number of Page for Pagination
        // Number of Rows in Database divide Number of Product per Page
        $pages_num = ceil($total_product / $item_per_page);

        // Get the Starting Product to Display per Page
        $item_start = ($page - 1) * $item_per_page;

        $query = "SELECT *FROM book ORDER BY register_date DESC LIMIT " . $item_start . ',' . $item_per_page;
        $run = mysqli_query($connect, $query);
    }
}

?>