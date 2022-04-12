<?php
// Create connection to the database
include_once "Functions/connection.php";
?>

<?php
// Get the required info for displaying into the table
$query = "SELECT * FROM customer";
$run = mysqli_query($connect, $query);
$count = mysqli_num_rows($run);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!--- External CSS --->
    <link rel="stylesheet" href="CSS/admin_sales_report.css">
    <link rel="icon" href="Images/tab_icon.png">
    <link rel="stylesheet" href="CSS/view_serial.css">
    <!--- Google Fonts --->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <style>
        .custInfo{
            margin-top: 50px;
            margin-bottom: 100px;
        }
    </style>
    <!--- Fonts Awesome Icons --->
    <script src="https://kit.fontawesome.com/9a0e60687c.js" crossorigin="anonymous"></script>

</head>

<body>
    <!--- Header Start --->
    <header>
        <nav>
            <h1>Customer Report</a></h1>
            <div class="nav_panel" id="navPanel">
                <div class="menu_button">
                    <i class="fas fa-caret-right" style="font-size: 35px; margin-left: 6px" ; onclick="hidePanel()"></i>
                </div>
                <!--- Items on NavPanel --->
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="Functions/logout.php">Logout</a></li>
                </ul>
            </div>
            <div class="menu_button">
                <i class="fas fa-bars" style="font-size: 22px;" onclick="showPanel()"></i>
            </div>
        </nav>
    </header>
    <!--- Header End --->

    <!--- Customer List --->
    <div >

        <div class="custInfo">
            <?php

            // If Bigger than 0 (Customer Amount Found)
            if($count > 0) { ?>
                <table width:100% class="styled-table">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Address</th>
                            <th>Password</th>
                            <th>Total Spending</th>
                            <th></th>
                        </tr>
                    </thead>
                <?php
                    while ($row = mysqli_fetch_array($run)) {
                        $uID = $row['CustID'];
                        $uName = $row['Username'];
                        $email = $row['Email'];
                        $phone = $row['PhoneNo'];
                        $address = $row['Address'];
                        $passW = $row['Password'];
                ?>
<?php
// Display Customer List Table
                        if($uName != "invalid_user") {
                    
                ?>
                            <tr>
                                <td><?php echo $uID ?></td>
                                <td><?php echo $uName ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $phone ?></td>
                                <td><?php echo $address ?></td>
                                <td><?php echo $passW ?></td>
                                <!--- Calculate Total Spending Start --->
                                <?php
                                    $query2 = "SELECT SUM(total_price) AS totalPrice FROM history WHERE CustID = '$uID'";
                                    $run2 = mysqli_query($connect, $query2);
                                    $result = mysqli_fetch_assoc($run2);
                                    $totalPrc = $result['totalPrice'];
                                    if ($totalPrc == null) {
                                        $totalPrc = " - ";
                                    }
                                ?>
                                <!--- Calculate Total Spending End --->
                                <td><?php echo 'RM ' . $totalPrc ?></td>
                                <td class="bbtn"><button type="submit" name="delete" class="delete"><a id="delete" href="Functions/delete_customer.php?delCus_ID=<?php echo $uID ?>">Delete</a></button></td>
                            </tr>
                <?php
                        }   
                    }
                ?>
                    </table>
            <?php 
                
            }

            ?>
        </div>

        
</body>
</html>