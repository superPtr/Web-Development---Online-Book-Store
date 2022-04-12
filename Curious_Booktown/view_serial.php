<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/view_serial.css">
    <title>View Serial</title>
</head>
<body>
    
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

        if(isset($_GET["id"])){
            $id = $_GET["id"];
            // Search Items Based On ID
            // SQL Query to Get Item
            $query = "SELECT * FROM stock INNER JOIN book on book.book_id = stock.book_id WHERE stock.book_id = $id";
            $run = mysqli_query($connect, $query);
            
            while($row = mysqli_fetch_array($run)){
                echo"<tr>";
                echo"<td>". $row['serial_number']."</td>";
                echo"<td>". $row['book_status']."</td>";
        
            }
        }
        
        ?>
        </tbody>

    </table>

</body>
</html> 