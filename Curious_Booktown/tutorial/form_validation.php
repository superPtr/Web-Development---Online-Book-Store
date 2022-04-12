<!DOCTYPE php>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2</title>
</head>

<body>

    <h1>Registration Form</h1>
    <form action="" method="POST">
        Username: <input type="text" name="Uname">
        <?php

        if(isset($_POST["submit"])){
            if(empty($_POST["Uname"])){
                echo "&nbsp Username Required";
            }
            elseif(!preg_match("/^[a-zA-Z\s0-9]+$/", $_POST["Uname"])){
                echo "Letters and Numbers Only!";
            }
            elseif(strlen($_POST["Uname"]) >= 15){
                echo "15 Characters Only!";
            }
        }
        ?>

        <br><br>

        Password: <input type="password" name="password">
        <?php
        if(isset($_POST["submit"])){
            if(empty($_POST["password"])){
                echo "&nbsp Password Required";
            }
            elseif(strlen($_POST["password"]) <= 4){
                echo "Minimum 4 Characters!";
            }
        }   
        ?>

        <br><br>
        Email: <input type="text" name="email">
        <?php

        if(isset($_POST["submit"])){
            if(empty($_POST["email"])){
                echo "&nbsp Email Required";
            }
            elseif (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false){
                echo "Invalid Email format";
              }
        }   
        ?>
        
        <br><br>
        Date of Birth: <input type="date" name="dob">
        <?php
        $todaydate = date('m/d/Y');

        if(isset($_POST["submit"])){
            if(empty($_POST["dob"])){
                echo "&nbsp Date of Birth Required";
            } 
            elseif(mktime($todaydate - $_POST["dob"]) < 18){
                echo "Not 18";
            }
            
        }   
        // function getAge($dob){
        //     $bday = new DateTime($dob);
        //     $today = new DateTime(datee("m.d.y"));
        //     if($bday > $today){
        //         echo "You are not born yet!";
        //     }
        // }

        // if(isset($_POST["submit"])){
        //     if(empty($_POST["dob"])){
        //         echo "&nbsp Date of Birth Required";
        //     } 
        //     elseif(isset($_POST["dob"]) && $_POST["dob"]!=""){}
        // }   
        ?>

        <br><br>
        Name: <input type="text" name="name">
        <?php
        if(isset($_POST["submit"])){
            if(empty($_POST["name"])){
                echo "&nbsp Name Required";
            }
            elseif(strlen($_POST["name"]) >= 50){
                echo "50 Characters Only!";
            }
        }   
        ?>
        
        <br><br>
        <input type="checkbox"  name="checkbox" value="checkedValue">
        <u>Terms & Conditions</u>
        <?php
        if(isset($_POST["submit"])){
            if(empty($_POST["checkbox"])){
                echo "&nbsp Check Required";
            }
        }   
        ?>
        
        <br><br>
        <input type="submit" value="submit" name="submit">
    </form>

</body>
</html>

<!-- $username = $_POST["Uname"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $dob = $_POST["dob"];
        $name = $_POST["name"];
        $checkbox = $_POST["checkbox"]; -->


