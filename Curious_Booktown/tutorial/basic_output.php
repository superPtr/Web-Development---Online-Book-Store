<?php 
    $title = "Contact Information"; 
    $name = "APIIT"; 
    $email = "anand@apiit.edu.my";
    $address = array("Lot 6 Technology Park Malaysia", "Bukit Jalil", "Kuala Lumpur");
    // $address[0] = "Lot 6 Technology Park Malaysia";
    // $address[1] = "Bukit Jalil";
    // $address[2] = "Kuala Lumpur";
    $postcode = "57000";
    $telephone = "0389961000";

?>


<!DOCTYPE php>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>

    <h1>Contact Information</h1>
    <p>Name = <?php echo $name ?></p>
    <p>Email = <?php echo $email ?></p>
    <p>Address = 
    <?php
    foreach($address as $value){
        echo $value . "&nbsp";
    }
    ?></p>
    <p>Postcode = <?php echo $postcode ?></p>
    <p>Telephone = <?php echo $telephone ?></p>

</body>
</html>


<!-- Tutorials
https://www.youtube.com/playlist?list=PL-h5aNeRKouF5PMqk8aAR5Hz0VxkvE3Lj -->

<!-- Admin CRUD
https://www.youtube.com/watch?v=72U5Af8KUpA&ab_channel=StepbyStep -->

<!-- Search Function
https://www.youtube.com/watch?v=9ANd4KVPQtE&list=PL-h5aNeRKouF5PMqk8aAR5Hz0VxkvE3Lj&index=12&ab_channel=StepbyStep -->

<!-- Home Latest Product -->

<!-- Product Page
https://www.youtube.com/watch?v=C1y42_icSLY&ab_channel=LearnPHPWithMySQL -->

<!-- Cart -->