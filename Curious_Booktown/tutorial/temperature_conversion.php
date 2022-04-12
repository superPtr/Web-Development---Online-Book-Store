<!DOCTYPE php>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 4</title>
</head>
<body>
    <form method="POST">
        Centigrade: <input type="text" name="centigrade">
        <input type="submit" value="convert" name=convFar>
    </form>

    <form method="POST">
        Farenheit: <input type="text" name="farenheit">
        <input type="submit" value="convert" name=convCen>
    </form>
</body>
</html>

<?php
    if(isset($_POST["convFar"])){
        $centigrade = $_POST["centigrade"];
        $far = $centigrade * 1.8 + 32;
        echo "Farenheit = " . $far . " °F";
    }

    if(isset($_POST["convCen"])){
        $farenheit = $_POST["farenheit"];
        $cen = ($farenheit - 32) * 5/9;
        echo "Centigrade = " . $cen . " °C";
    }
?>