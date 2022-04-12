<!DOCTYPE php>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 3</title>
</head>
<body>

    <form method="POST">
        Miles: <input type="text" name="miles">
        <input type="submit" value="compute" name=compute>
    </form>

</body>
</html>

<?php
    if(isset($_POST["compute"])){
        $miles = $_POST["miles"];
        $kilometer = "1.6";
        $conversion = $miles * $kilometer;
        echo "Kilometer = " . $conversion . " km";
    }
?>