<?php
//Connect to Database
include "functions/connection.php";

//Get All Genre List
$genrelist = array();
$query = "SELECT genre FROM genre";
$run = mysqli_query($connect, $query);
while ($row = mysqli_fetch_array($run)) {
    $genrelist[] = $row["genre"];
}

//Calculate Books Based on Genre ID 1 (Horror)
$query1 = "SELECT count(genre_id) AS genre_1 FROM book WHERE genre_id = 1";
$run = mysqli_query($connect, $query1);
while($row = mysqli_fetch_array($run)){
    $horror = $row['genre_1'];
}

//Calculate Books Based on Genre ID 2 (Romance)
$query2 = "SELECT count(genre_id) AS genre_2 FROM book WHERE genre_id = 2";
$run = mysqli_query($connect, $query2);
while($row = mysqli_fetch_array($run)){
    $romance = $row['genre_2'];
}

//Calculate Books Based on Genre ID 3 (Mystery)
$query3 = "SELECT count(genre_id) AS genre_3 FROM book WHERE genre_id = 3";
$run = mysqli_query($connect, $query3);
while($row = mysqli_fetch_array($run)){
    $mystery = $row['genre_3'];
}

//Calculate Books Based on Genre ID 4 (Fantasy)
$query4 = "SELECT count(genre_id) AS genre_4 FROM book WHERE genre_id = 4";
$run = mysqli_query($connect, $query4);
while($row = mysqli_fetch_array($run)){
    $fantasy = $row['genre_4'];
}

//Calculate Books Based on Genre ID 5 (Science Fiction)
$query5 = "SELECT count(genre_id) AS genre_5 FROM book WHERE genre_id = 5";
$run = mysqli_query($connect, $query5);
while($row = mysqli_fetch_array($run)){
    $sci_fi = $row['genre_5'];
}

//Calculate Books Based on Genre ID 6 (Adventure)
$query6 = "SELECT count(genre_id) AS genre_6 FROM book WHERE genre_id = 6";
$run = mysqli_query($connect, $query6);
while($row = mysqli_fetch_array($run)){
    $adventure = $row['genre_6'];
}

//Calculate Sold Books Based on Genre ID 1 (Horror)
$sold_books_1 = array();
$query7 = "SELECT count(book.book_id) AS sold_1 FROM stock INNER JOIN book ON stock.book_id = book.book_id WHERE book_status = 'sold' AND genre_id = 1";
$run = mysqli_query($connect, $query7);
while($row = mysqli_fetch_array($run)){
    $sold_books_1[] = $row['sold_1'];
}

//Calculate Sold Books Based on Genre ID 2 (Romance)
$sold_books_2 = array();
$query8 = "SELECT count(book.book_id) AS sold_2 FROM stock INNER JOIN book ON stock.book_id = book.book_id WHERE book_status = 'sold' AND genre_id = 2";
$run = mysqli_query($connect, $query8);
while($row = mysqli_fetch_array($run)){
    $sold_books_2[] = $row['sold_2'];
}

//Calculate Sold Books Based on Genre ID 3 (Mystery)
$sold_books_3 = array();
$query9 = "SELECT count(book.book_id) AS sold_3 FROM stock INNER JOIN book ON stock.book_id = book.book_id WHERE book_status = 'sold' AND genre_id = 3";
$run = mysqli_query($connect, $query9);
while($row = mysqli_fetch_array($run)){
    $sold_books_3[] = $row['sold_3'];
}

//Calculate Sold Books Based on Genre ID 4 (Fantasy)
$sold_books_4 = array();
$query10 = "SELECT count(book.book_id) AS sold_4 FROM stock INNER JOIN book ON stock.book_id = book.book_id WHERE book_status = 'sold' AND genre_id = 4";
$run = mysqli_query($connect, $query10);
while($row = mysqli_fetch_array($run)){
    $sold_books_4[] = $row['sold_4'];
}

//Calculate Sold Books Based on Genre ID 5 (Science Fiction)
$sold_books_5 = array();
$query11 = "SELECT count(book.book_id) AS sold_5 FROM stock INNER JOIN book ON stock.book_id = book.book_id WHERE book_status = 'sold' AND genre_id = 5";
$run = mysqli_query($connect, $query11);
while($row = mysqli_fetch_array($run)){
    $sold_books_5[] = $row['sold_5'];
}

//Calculate Sold Books Based on Genre ID 6 (Adventure)
$sold_books_6 = array();
$query12 = "SELECT count(book.book_id) AS sold_6 FROM stock INNER JOIN book ON stock.book_id = book.book_id WHERE book_status = 'sold' AND genre_id = 6";
$run = mysqli_query($connect, $query12);
while($row = mysqli_fetch_array($run)){
    $sold_books_6[] = $row['sold_6'];
}


//Set Months in Array
$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

//Set Default When Filter Button Not Clicked
//Get Current Year
$c_year = date('Y');
//Calculate Total Price in January Based on Year
$query13 = "SELECT sum(total_price) AS price_1 FROM history WHERE MONTH(r_date) = 1 AND YEAR(r_Date) = $c_year";
$run = mysqli_query($connect, $query13);
while($row = mysqli_fetch_array($run)){
    $priceJan = $row['price_1'];
}

//Calculate Total Price in February Based on Year
$query14 = "SELECT sum(total_price) AS price_2 FROM history WHERE MONTH(r_date) = 2 AND YEAR(r_Date) = $c_year";
$run = mysqli_query($connect, $query14);
while($row = mysqli_fetch_array($run)){
    $priceFeb = $row['price_2'];
}

//Calculate Total Price in March Based on Year
$query15 = "SELECT sum(total_price) AS price_3 FROM history WHERE MONTH(r_date) = 3 AND YEAR(r_Date) = $c_year";
$run = mysqli_query($connect, $query15);
while($row = mysqli_fetch_array($run)){
    $priceMar = $row['price_3'];
}

//Calculate Total Price in April Based on Year
$query16 = "SELECT sum(total_price) AS price_4 FROM history WHERE MONTH(r_date) = 4 AND YEAR(r_Date) = $c_year";
$run = mysqli_query($connect, $query16);
while($row = mysqli_fetch_array($run)){
    $priceApr = $row['price_4'];
}

//Calculate Total Price in May Based on Year
$query17 = "SELECT sum(total_price) AS price_5 FROM history WHERE MONTH(r_date) = 5 AND YEAR(r_Date) = $c_year";
$run = mysqli_query($connect, $query17);
while($row = mysqli_fetch_array($run)){
    $priceMay = $row['price_5'];
}

//Calculate Total Price in June Based on Year
$query18 = "SELECT sum(total_price) AS price_6 FROM history WHERE MONTH(r_date) = 6 AND YEAR(r_Date) = $c_year";
$run = mysqli_query($connect, $query18);
while($row = mysqli_fetch_array($run)){
    $priceJun = $row['price_6'];
}

//Calculate Total Price in July Based on Year
$query19 = "SELECT sum(total_price) AS price_7 FROM history WHERE MONTH(r_date) = 7 AND YEAR(r_Date) = $c_year";
$run = mysqli_query($connect, $query19);
while($row = mysqli_fetch_array($run)){
    $priceJul = $row['price_7'];
}

//Calculate Total Price in August Based on Year
$query20 = "SELECT sum(total_price) AS price_8 FROM history WHERE MONTH(r_date) = 8 AND YEAR(r_Date) = $c_year";
$run = mysqli_query($connect, $query20);
while($row = mysqli_fetch_array($run)){
    $priceAug = $row['price_8'];
}

//Calculate Total Price in September Based on Year
$query21 = "SELECT sum(total_price) AS price_9 FROM history WHERE MONTH(r_date) = 9 AND YEAR(r_Date) = $c_year";
$run = mysqli_query($connect, $query21);
while($row = mysqli_fetch_array($run)){
    $priceSept = $row['price_9'];
}

//Calculate Total Price in October Based on Year
$query22 = "SELECT sum(total_price) AS price_10 FROM history WHERE MONTH(r_date) = 10 AND YEAR(r_Date) = $c_year";
$run = mysqli_query($connect, $query22);
while($row = mysqli_fetch_array($run)){
    $priceOct = $row['price_10'];
}

//Calculate Total Price in November Based on Year
$query23 = "SELECT sum(total_price) AS price_11 FROM history WHERE MONTH(r_date) = 11 AND YEAR(r_Date) = $c_year";
$run = mysqli_query($connect, $query23);
while($row = mysqli_fetch_array($run)){
    $priceNov = $row['price_11'];
}

//Calculate Total Price in December Based on Year
$query24 = "SELECT sum(total_price) AS price_12 FROM history WHERE MONTH(r_date) = 12 AND YEAR(r_Date) = $c_year";
$run = mysqli_query($connect, $query24);
while($row = mysqli_fetch_array($run)){
    $priceDec = $row['price_12'];
}

//When User Click Filter Year Button
if(isset($_POST["submit"])){
    //Get Year
    $year = $_POST["getYear"];

    //Calculate Total Price in January Based on Year
    $query25 = "SELECT sum(total_price) AS price_1 FROM history WHERE MONTH(r_date) = 1 AND YEAR(r_Date) = $year";
    $run = mysqli_query($connect, $query25);
    while($row = mysqli_fetch_array($run)){
        $priceJan = $row['price_1'];
    }

    //Calculate Total Price in February Based on Year
    $query26 = "SELECT sum(total_price) AS price_2 FROM history WHERE MONTH(r_date) = 2 AND YEAR(r_Date) = $year";
    $run = mysqli_query($connect, $query26);
    while($row = mysqli_fetch_array($run)){
        $priceFeb = $row['price_2'];
    }

    //Calculate Total Price in March Based on Year
    $query27 = "SELECT sum(total_price) AS price_3 FROM history WHERE MONTH(r_date) = 3 AND YEAR(r_Date) = $year";
    $run = mysqli_query($connect, $query27);
    while($row = mysqli_fetch_array($run)){
        $priceMar = $row['price_3'];
    }

    //Calculate Total Price in April Based on Year
    $query28 = "SELECT sum(total_price) AS price_4 FROM history WHERE MONTH(r_date) = 4 AND YEAR(r_Date) = $year";
    $run = mysqli_query($connect, $query28);
    while($row = mysqli_fetch_array($run)){
        $priceApr = $row['price_4'];
    }

    //Calculate Total Price in May Based on Year
    $query29 = "SELECT sum(total_price) AS price_5 FROM history WHERE MONTH(r_date) = 5 AND YEAR(r_Date) = $year";
    $run = mysqli_query($connect, $query29);
    while($row = mysqli_fetch_array($run)){
        $priceMay = $row['price_5'];
    }

    //Calculate Total Price in June Based on Year
    $query30 = "SELECT sum(total_price) AS price_6 FROM history WHERE MONTH(r_date) = 6 AND YEAR(r_Date) = $year";
    $run = mysqli_query($connect, $query30);
    while($row = mysqli_fetch_array($run)){
        $priceJun = $row['price_6'];
    }

    //Calculate Total Price in July Based on Year
    $query31 = "SELECT sum(total_price) AS price_7 FROM history WHERE MONTH(r_date) = 7 AND YEAR(r_Date) = $year";
    $run = mysqli_query($connect, $query31);
    while($row = mysqli_fetch_array($run)){
        $priceJul = $row['price_7'];
    }

    //Calculate Total Price in August Based on Year
    $query32 = "SELECT sum(total_price) AS price_8 FROM history WHERE MONTH(r_date) = 8 AND YEAR(r_Date) = $year";
    $run = mysqli_query($connect, $query32);
    while($row = mysqli_fetch_array($run)){
        $priceAug = $row['price_8'];
    }

    //Calculate Total Price in September Based on Year
    $query33 = "SELECT sum(total_price) AS price_9 FROM history WHERE MONTH(r_date) = 9 AND YEAR(r_Date) = $year";
    $run = mysqli_query($connect, $query33);
    while($row = mysqli_fetch_array($run)){
        $priceSept = $row['price_9'];
    }

    //Calculate Total Price in October Based on Year
    $query34 = "SELECT sum(total_price) AS price_10 FROM history WHERE MONTH(r_date) = 10 AND YEAR(r_Date) = $year";
    $run = mysqli_query($connect, $query34);
    while($row = mysqli_fetch_array($run)){
        $priceOct = $row['price_10'];
    }

    //Calculate Total Price in November Based on Year
    $query35 = "SELECT sum(total_price) AS price_11 FROM history WHERE MONTH(r_date) = 11 AND YEAR(r_Date) = $year";
    $run = mysqli_query($connect, $query35);
    while($row = mysqli_fetch_array($run)){
        $priceNov = $row['price_11'];
    }

    //Calculate Total Price in December Based on Year
    $query36 = "SELECT sum(total_price) AS price_12 FROM history WHERE MONTH(r_date) = 12 AND YEAR(r_Date) = $year";
    $run = mysqli_query($connect, $query36);
    while($row = mysqli_fetch_array($run)){
        $priceDec = $row['price_12'];
    }

}
?>