<?php
include_once "Functions/connection.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/receipt.css">
    <title>Receipt</title>
</head>
<body>

    <div class='box'>
        <div id="invoice-POS">
        
        <center id="top">
            
        <div class="main"><div class="closeBtn" onclick="window.location.href='index.php'">
                    &times;
                </div>Receipt</div>
        <div class="info">
            <h2>Curious Booktown</h2>
        </div>
        <!--End Info-->
        </center>
        <!--End InvoiceTop-->

        <div id="mid">
        <div class="info">
            <h2>Contact Info</h2>
            <p>
            
            Email : Curiousbookstore@gmail.com</br>
            Phone : 012-3456789</br>
            </p>
        </div>
        </div>
        <!--End Invoice Mid-->

        <div id="bot">

        <div id="table">
            <table class='styled-table'>
            <thead>
            <tr class="tabletitle">
                <td>
                Item
                </td>
                <td>
                Serial Number
                </td>
                <td>
                Sub Total
                </td>
            </tr>
            </thead>
            <tbody>
            <?php
                $userid = $_SESSION['user_id'];
                // SQL Query 1 (Get User Cart Items)
                $query = "SELECT *
                FROM (((history 
                INNER JOIN bill ON bill.history_id = history.history_id)
                INNER JOIN stock ON bill.serial_number = stock.serial_number)
                INNER JOIN book ON book.book_id = stock.book_id)
                WHERE history.CustID = $userid AND r_date = (SELECT MAX(r_date) FROM history)";



                $run = mysqli_query($connect, $query);

                // Read cart item x5
                while($row = mysqli_fetch_array($run)){
                    $Name = $row['name'];
                    $serial = $row['serial_number'];
                    $price = $row['price'];
                    $total_price = $row['total_price'];

                    
                    
                    echo "<tr>";
                    
                    echo "<td>"."<p>".$Name."</p>"."</td>";
                    echo "<td>"."<p>".$serial."</p>"."</td>";
                    echo "<td>"."<p>".$price."</p>"."</td>";

                
                }
                echo "<tr>";
                echo "<td></td>";
                echo "</tr>";

                
                echo "<tr>";
                echo "<td>"."<h5>".'Grand Total:'."</h5>"."</td>";
                echo "<td></td>";
                 echo "<td>"."<p>".$total_price."</p>"."</td>";
                echo "</tr>";
            ?>

            </tbody>


            </table>
        </div>
        <!--End Table-->

        <div id="legalcopy">
            <p class="legal"><strong>Thank you for your purchase!</strong> 
        </div>

        </div>
        <!--End InvoiceBot-->
        </div>
        <!--End Invoice-->
    </div>

    
</body>
</html>