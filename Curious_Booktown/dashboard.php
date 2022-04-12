<?php
//Add Functions into Website
include_once "Functions/delete_product.php";
include_once "Functions/update_product.php";
include_once "Functions/connection.php";
include_once "Functions/addSerial.php";

// Start Session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!--- External CSS --->
    <link rel="stylesheet" href="CSS/dashboard.css">
    <link rel="icon" href="Images/tab_icon.png">
    <link rel="stylesheet" href="CSS/view_serial.css">
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
    <!--- Creating Header --->
    <header>
        <nav>
            <h1>Welcome to Admin Dashboard</a></h1>
            <div class="nav_panel" id="navPanel">
                <div class="menu_button">
                    <i class="fas fa-caret-right" style="font-size: 35px; margin-left: 6px" ; onclick="hidePanel()"></i>
                </div>
                <!--- Items on NavPanel --->
                <ul>
                    
                    <li><a href="Functions/logout.php">Logout</a></li>
                </ul>
            </div>
            <div class="menu_button">
                <i class="fas fa-bars" style="font-size: 22px;" onclick="showPanel()"></i>
            </div>
        </nav>
    </header>
    <!--- Creating Header End --->


    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <main>
        <div class="container">
            <!--- Statistic Section Start --->
            <div class="title">
                <h1>Statistic</h1>
            </div>
            <div class="t_product">

                <div class="content">
                    <!--- Total Products in Database Start--->
                    <?php
                    // SQL Query
                    $query = "SELECT *FROM book";
                    $run = mysqli_query($connect, $query);

                    // Calculate Number of Rows From Database
                    $total = mysqli_num_rows($run);

                    // Display Total Books:
                    echo
                    "<h2>Total Products:</h2>
                    <h3>$total</h3>"
                    ?>
                    <!--- Total Products in Database End--->
                </div>

                <div class="content">
                    <!--- Total Products Available Start--->
                    <?php
                    // SQL Query
                    $query = "SELECT count(book_status) AS available FROM stock WHERE book_status = 'available'";
                    $run = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($run)) {
                        $available = $row['available'];
                    }
                    ?>
                    <!--- Display Total Products Available --->
                    <h2>Stocks Available:</h2>
                    <h3><?php echo $available ?></h3>
                    <!--- Total Products Available End--->
                </div>

                <div class="content">
                    <!--- Total Products Sold Start--->
                    <?php
                    // SQL Query
                    $query = "SELECT count(book_status) AS sold FROM stock WHERE book_status = 'sold'";
                    $run = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($run)) {
                        $sold = $row['sold'];
                    }
                    ?>
                    <!--- Display Total Products Sold --->
                    <h2>Products Sold:</h2>
                    <h3><?php echo $sold ?></h3>
                    <!--- Total Products Sold End--->
                </div>

                <div class="content">
                    <!--- Total Sales Start--->
                    <?php
                    // SQL Query
                    $query = "SELECT SUM(total_price) AS total_price FROM history";
                    $run = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($run)) {
                        $total_price = $row['total_price'];
                    }
                    ?>
                    <!--- Display Total Sales --->
                    <h2>Total Sales:</h2>
                    <h3><?php echo 'RM' . $total_price ?></h3>
                    <!--- Total Sales End--->
                </div>
            </div>
            <!--- Statistic Section End --->


            <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


            <!--- Products Section Start --->
            <div class="p_container">
                <div class="title">
                    <h1>Products</h1>
                </div>
                <!--- Create Add Button Start--->
                <div class="popup" id="popup">
                    <div class="overlay"></div>
                    <div class="selection">
                        <div class="closeBtn" onclick="popupMsg()">
                            &times;
                        </div>
                        <div class="option">
                            <h1>Select an Option</h1>
                            <form method="post"><button type="submit" name="add" class="add_btn"><a href="add_book.php">Add New Book</a></button>
                            <button type="submit" name="add_serial" class="add_btn">Add Serial Number</button></form>
                            
                        </div>
                    </div>
                    <button type="submit" name="add" class="add_btn" onclick="popupMsg()">Add New Book</button>
                </div>
                <div class="popup" id="popup5">
                    <div class="overlay"></div>
                    <div class="selection">
                        <div class="closeBtn" onclick="popupMsg5()">
                            &times;
                        </div>
                        <div class="option">
                            <h1>Select an Option</h1>
                            <form method="post"><button type="submit" name="add" class="add_btn"><a href="customer_report.php">Customer Report</a></button>
                            <button class="add_btn" ><a href="admin_sales_report.php">Sales Report</a></button></form>
                            
                        </div>
                    </div>
                    <button type="submit" name="add" class="add_btn" onclick="popupMsg5()">View Report</button>
                </div>












                
                <!--- Create Add Button End--->
            </div>
            <div class="search">
                <!--- Form for Search Products Start --->
                <form method="GET" action="">
                    <input type="text" name="search" class="s_item" placeholder="Enter Book Name to Search">
                    <button type="submit" name="search_item" class="s_btn">Search</button>






                    
                    <select name="sort" class="input_sort">
                        <option value="">Sort an Item</option>
                        <option value="1">A-Z (Ascending Order)</option>
                        <option value="2">Z-A (Descending Order)</option>
                        <option value="3">Oldest-Latest Book</option>
                        <option value="4">Latest-Oldest Book</option>
                    </select>
                    <button type="submit" name="sort_item" class="s_btn">Sort</button>






                    
                    <button type="submit" name="clear" class="s_btn">Clear</button>
                </form>
                <!--- Form for End Products Start --->
            </div>
            <div class="products">

                <!--- Display Products in Database and Search Products Start --->
                <?php

                // Add Pagination and Filter Function
                include_once "Functions/dashboard_pagination_filter.php";

                // Put Items in Array
                while ($row = mysqli_fetch_array($run)) {

                ?>
                    <!--- Product Content Start --->
                    <div class="product_sec">
                        <div class="p_items">
                            <!--- Print Out Item In Array --->
                            <img src="Images/<?php echo $row["image"] ?>" alt="">
                            <div class="items">
                                <p class="name"><?php echo $row["name"] ?></p>
                                <p class="brand"><?php echo $row["author"] ?></p>
                                <p class="price"><?php echo "RM" . $row["price"] ?></p>

                                <p><?php
                                    $id = $row['book_id'];
                                    $query2 = "SELECT * FROM stock INNER JOIN book on book.book_id = stock.book_id WHERE book_status = 'available' and stock.book_id = $id";
                                    $run2 = mysqli_query($connect, $query2);
                                    $cnt = 0;
                                    while ($row2 = mysqli_fetch_array($run2)) {
                                        $cnt += 1;
                                    }
                                    $quantity = $cnt;
                                    echo "Quantity: " . $quantity
                                    ?></p>
                            </div>



                            
                        </div>
                        <!--- Product Content End --->
                        
                        <!--- Create Update, View and Delete Button Start--->
                        <form class="p_btn" method="POST" >
                            
                            <button type="submit" name="update1" class="btn" value="<?php echo $row['book_id']?>">Update</button>
                            
                            
                            <button type="submit" name="view" class="btn"><a href="admin_view.php?id=<?php echo $row["book_id"] ?>">View</a></button>
                             
                            <button type="submit" name="serial" class="btn" value="<?php echo $row["book_id"]?>">Serial Number List</button>
                            
                            <button type="submit" name="delete" class="btn"><a href="Functions/delete_product.php?delete_ID=<?php echo $row["book_id"] ?>">Delete</a></button>
                            
                        </form>
                        <!--- Create Update, View and Delete Button End--->
                    </div>
                <?php
                }
                ?>
                <div class="pagination">

                    <?php                                 
                    for ($page_list = 1; $page_list <= $pages_num; $page_list++) {
                        if ($page_list == $page) {
                            echo '<div class="page_box"><a class="selected_pg">' . $page . '   </a></div>';
                        }
                        
                        elseif(isset($sort)){
                            echo '<p><a href="dashboard.php?page=' . $page_list . "&sort=" . $sort . "&search=&sort_item=" . '">' . $page_list . '</a></p>';
                        }

                        else {
                            echo '<p><a href="dashboard.php?page=' . $page_list . '">' . $page_list . '</a></p>';
                        }
                    }                    
                    ?>
    
                </div>
                <!--- Display Products in Database and Search Products End --->
            </div>
            <!--- Products Section End --->
        </div>
        <div class="popup" id="popup2">
            <div class="overlay"></div>
            <div class="serial_list">
                <div class="closeBtn" onclick="closeMsg2()">
                    &times;
                </div>
                <div class="option">
                    <table class = "styled-table">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Book Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include_once "Functions/connection.php";
                            $id = $_POST['serial'];
                            // Search Items Based On ID
                            // SQL Query to Get Item
                            $query = "SELECT * FROM stock INNER JOIN book on book.book_id = stock.book_id WHERE stock.book_id = $id";
                            $run = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_array($run)){
                                echo"<tr>";
                                echo"<td>". $row['serial_number']."</td>";
                                echo"<td>". $row['book_status']."</td>";
                            }
                        
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        
<!-- ----------------------------update product------------------------------------------------------------- -->

<div class="popup" id="popup3">
    <div class="overlay"></div>
    <div class="update_box">
        <div class="closeBtn" onclick="closeMsg3()">
            &times;
        </div>
        <div class="option">
            <div class="container">
                <!---- Back button for admin back to dashboard start---->

    <!----Back button for admin back to dashboard end---->

    
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


            <div class="content" id="desc">
                <!--- Features Input Field --->
                <label>Description</label><br>
                <!--- Display Item In Database using 'Value' --->
                <input type="text" class="input" id="desc_box" placeholder="Enter Description" name="desc" autocomplete="off" value="<?php echo $desc ?>">
                <!--- Print Out Text in Array --->
                <?php  if(isset($error["desc"])) echo $error["desc"] ?>
            </div>


            <!--- Save Button --->
            <button type="submit" name="update" class="update" value="<?php echo $_POST['update1']?>">Update</button>
        </form>
        <!--- Creating Form For Admin to Add/Update Product End --->
     
                
            </div>
        </div>
    </div>
 </div>
</div>



<!-- ------------------------------update product end----------------------------------------------------------------------- -->
<!-- --------------------add serial start------------------------ -->
    <div class="popup" id="popup4">
        <div class="overlay"></div>
        <div class="addserial">
            <div class="closeBtn" onclick="closeMsg4()">
                &times;
            </div>    

            <div class="container">
                <!--- Creating Form For Admin to Add/Update Product Start --->
                <form method="POST" enctype="multipart/form-data">
                <div class="content">
                        <!--- Category Input Field --->
                        <label>Book Title</label><br>
                        <!--- Input Options For Users --->
                        <select name="book" class="input">
                            <option value="">Select a Book</option>
                            <?php
                            // SQL Query (Get Category Items)
                            $query = "SELECT * FROM book ORDER BY name ASC";
                            $run = mysqli_query($connect, $query);
                            // Put Items in Array
                            while ($row = mysqli_fetch_array($run)){
                            ?>
                            <!--- Display All Items in Category Table --->
                            <option value="<?php echo $row["book_id"] ?>"><?php echo $row["name"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <!--- Print Out Text in Array --->
                        <?php  if(isset($error["book"])) echo $error["book"] ?>
                    </div>

                    <div class="content">
                        <!--- Brand Input Field --->
                        <label>Serial Number</label><br>
                        <input type="text" class="input" placeholder="Enter Serial Number" name="serial_no" autocomplete="off">
                        <input type="hidden" class="input" name="status" value="available">
                        <!--- Print Out Text in Array --->
                        <?php  if(isset($error["serial_no"])) echo $error["serial_no"]; elseif(isset($error["serial_no2"])) echo $error["serial_no2"] ?>
                    </div>

                    <!--- Save Button --->
                    <button type="submit" name="submit" class="submit">Save</button>
                </form>
                <!--- Creating Form For Admin to Add/Update Product End --->
            </div>
        </div>
    </div>
    



<!-- --------------------------------------add serial end------------------------------------------------------------------------------- -->























        <?php
            if(isset($_POST['serial'])){
                echo "<script type='text/javascript'>document.getElementById('popup2').classList.toggle('enable'); </script>";
                
            }

            if(isset($_POST['update1'])){
                echo "<script type='text/javascript'>document.getElementById('popup3').classList.toggle('enable'); </script>";
            }
            if(isset($_POST['add_serial'])){
                
                echo "<script type='text/javascript'>document.getElementById('popup4').classList.toggle('enable'); </script>";
            }
        ?>
       

        



















    </main>


    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <!--- Javascript Start--->
    <script>
        // Responsive NavPanel
        var navLinks = document.getElementById("navPanel");

        //Show Menu
        function showPanel() {
            navLinks.style.right = "0px"
        }

        //Hide Menu
        function hidePanel() {
            navLinks.style.right = "-300px"
        }
        function popupMsg() {
            document.getElementById("popup").classList.toggle("enable");
        }
        function closeMsg(){
                    document.getElementById("popup").classList.toggle("enable");
                }
        function closeMsg2(){
            document.getElementById("popup2").classList.toggle("enable");
        }
        function closeMsg3(){
                    document.getElementById("popup3").classList.toggle("enable");
                }
        function closeMsg4(){
            document.getElementById("popup4").classList.toggle("enable");
        }
        function popupMsg5() {
            document.getElementById("popup5").classList.toggle("enable");
        }        
        function closeMsg5(){
            document.getElementById("popup5").classList.toggle("enable");
        }        
    </script>
    <!--- Javascript Start End--->


    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


</body>

</html>