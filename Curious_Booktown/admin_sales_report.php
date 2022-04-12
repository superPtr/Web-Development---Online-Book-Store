<?php
// Create Connection to Database
include "generate_report.php";

// Start Session
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>

    <!--- External CSS --->
    <link rel="stylesheet" href="CSS/admin_sales_report.css">
    <link rel="icon" href="Images/tab_icon.png">

    <!--- Google Fonts --->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

    <!--- Fonts Awesome Icons --->
    <script src="https://kit.fontawesome.com/9a0e60687c.js" crossorigin="anonymous"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script> -->

</head>

<body>
    <!--- Creating Header --->
    <header>
        <nav>
            <h1>Sales Report</a></h1>
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
    <!--- Creating Header End --->


    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <main>
        <div class="stat_sec">
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

                    // Display Total Products
                    echo
                    "<h2>Total Books:</h2>
                    <h3>$total</h3>"
                    ?>
                    <!--- Total Products in Database End--->
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
                    <h2>Books Sold:</h2>
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
        </div>
        <!--- Statistic Section End --->


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <!-- Chart Section -->
        <div class="chart_sec">
            <div class="pie">
                <!-- Create Pie Chart -->
                <div class="chart_1">
                    <canvas id="pieChart_1"></canvas>
                </div>
                <div class="chart_2">
                    <canvas id="pieChart_2"></canvas>
                </div>
            </div>
            <div class="chart_3">
                <!-- Create Bar Chart -->
                <canvas id="barChart"></canvas>
                <!-- Create Form For Filter -->
                <form method="POST" class="filter_year">
                    <label class="form_title">Year:</label>
                    <!-- Create Year Selection -->
                    <select name="getYear" class="select_year">
                        <?php
                        //Get Current Year
                        $current_year = date('Y');
                        //Set Starting Year
                        $start_year = 2020;
                        //Loop Year to Get Year Range
                        for($i=$start_year; $i<=$current_year; $i++){
                            $years[] = $i;
                        }
                        //Rearrange Year in Descending Order
                        rsort($years);
                        //Display Year
                        foreach($years as $each_year){
                        ?>
                        <option value="<?php echo $each_year ?>"><?php echo $each_year ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <!-- Create Filter Button -->
                    <button type="submit" name="submit" class="btn">Filter</button>
                </form>
            </div>
        </div>


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


        <!-- Javascript Code For Designing Chart -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
        <script>
        //Designing Pie Chart 1 (Left)
        //Encode PHP Value to Allow Javascript to Read Data
        const genrelist = (<?php echo json_encode($genrelist); ?>)
        const horror = (<?php echo json_encode($horror); ?>)
        const romance = (<?php echo json_encode($romance); ?>)
        const mystery = (<?php echo json_encode($mystery); ?>)
        const fantasy = (<?php echo json_encode($fantasy); ?>)
        const sci_fi = (<?php echo json_encode($sci_fi); ?>)
        const adventure = (<?php echo json_encode($adventure); ?>)
        //Create Pie Chart
        const ctx_1 = document.getElementById('pieChart_1').getContext('2d');
        const pieChart_1 = new Chart(ctx_1, {
            //Chart Type
            type: 'pie',
            data: {
                //Set Labels (x-axis)
                labels: genrelist,
                datasets: [{
                    label: '# of Votes',
                    //Set Data (y-axis)
                    data: [horror, romance, mystery, fantasy, sci_fi, adventure],
                    //Design Data Background and Border
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    //Set and Design Chart Title
                    title: {
                        display: true,
                        text: 'Total Books Based on Genre',
                        color: 'black',
                        font: {
                            size: 24,
                            family: 'Montserrat',                           
                        }
                    }
                }
            }
        });
        </script>

        <script>
        //Designing Pie Chart 2 (Right)
        //Encode PHP Value to Allow Javascript to Read Data
        const soldGenre1 = (<?php echo json_encode($sold_books_1); ?>)
        const soldGenre2 = (<?php echo json_encode($sold_books_2); ?>)
        const soldGenre3 = (<?php echo json_encode($sold_books_3); ?>)
        const soldGenre4 = (<?php echo json_encode($sold_books_4); ?>)
        const soldGenre5 = (<?php echo json_encode($sold_books_5); ?>)
        const soldGenre6 = (<?php echo json_encode($sold_books_6); ?>)
        //Create Pie Chart
        const ctx_2 = document.getElementById("pieChart_2").getContext('2d');
        const pieChart_2 = new Chart(ctx_2, {
            //Chart Type
            type: 'pie',
            data: {
                //Set Labels (x-axis)
                labels: genrelist,
                datasets: [{
                    label: '# of Votes',
                    //Set Data (y-axis)
                    data: [soldGenre1, soldGenre2, soldGenre3, soldGenre4, soldGenre5, soldGenre6],
                    //Design Data Background and Border
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    //Set and Design Chart Title
                    title: {
                        display: true,
                        text: 'Books Sold Based on Genre',
                        color: 'black',
                        font: {
                            size: 24,
                            family: 'Montserrat',                           
                        }
                    }
                }
            }
        });
        </script>

        <script>
        //Designing Bar Chart
        //Encode PHP Value to Allow Javascript to Read Data
        const monthList = (<?php echo json_encode($months); ?>)
        const priceJan = (<?php echo json_encode($priceJan); ?>)
        const priceFeb = (<?php echo json_encode($priceFeb); ?>)
        const priceMar = (<?php echo json_encode($priceMar); ?>)
        const priceApr = (<?php echo json_encode($priceApr); ?>)
        const priceMay = (<?php echo json_encode($priceMay); ?>)
        const priceJun = (<?php echo json_encode($priceJun); ?>)
        const priceJul = (<?php echo json_encode($priceJul); ?>)
        const priceAug = (<?php echo json_encode($priceAug); ?>)
        const priceSept = (<?php echo json_encode($priceSept); ?>)
        const priceOct = (<?php echo json_encode($priceOct); ?>)
        const priceNov = (<?php echo json_encode($priceNov); ?>)
        const priceDec = (<?php echo json_encode($priceDec); ?>)
        //Create Bar Chart
        const ctx_3 = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctx_3, {
            //Chart Type
            type: 'bar',
            data: {
                //Set Labels (x-aixs)
                labels: monthList,
                datasets: [{
                    //Set Data (y-aixs)
                    data: [priceJan, priceFeb, priceMar, priceApr, priceMay, priceJun, priceJul, priceAug, priceSept, priceOct, priceNov, priceDec],
                    //Design Data Background and Border
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(67, 230, 55, 0.5)',
                        'rgba(240, 155, 10, 0.5)',
                        'rgba(247, 0, 214, 0.5)',
                        'rgba(25, 0, 247, 0.5)',
                        'rgba(0, 247, 193, 0.5)',
                        'rgba(247, 0, 0, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(67, 230, 55, 1)',
                        'rgba(240, 155, 10, 1)',
                        'rgba(247, 0, 214, 1)',
                        'rgba(25, 0, 247, 1)',
                        'rgba(0, 247, 193, 1)',
                        'rgba(247, 0, 0, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    //Set and Design Chart Title
                    title: {
                        display: true,
                        text: 'Monthly Sales Based on Year',
                        color: 'black',
                        font: {
                            size: 24,
                            family: 'Montserrat',
                            
                        }
                    }
                },
            }
        });
        </script>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    </main>
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