<!DOCTYPE php>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2</title>
</head>

<body>

    <form action="" method="POST">
        Name: <input type="text" name="name">
        <br><br>
        Email: <input type="text" name="email">
        <br><br>
        Address: <input type="text" name="address">
        <br><br>
        Postal Code: <input type="text" name="postalCode">
        <br><br>
        Telephone Number: <input type="text" name="telNum">
        <br><br>
        <input type="submit" value="submit" name="submit">
    </form>

    <br><hr><br>

    <p><u>Output</u></p>

</body>
</html>

<?php
    const br = "<br>";

    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $postalCode = $_POST["postalCode"];
        $telephone = $_POST["telNum"];

        echo "Name: " . $name ;
        echo br; echo br;
        echo "Email: " . $email ;
        echo br; echo br;
        echo "Address: " . $address ;
        echo br; echo br;
        echo "Postal Code: " . $postalCode ;
        echo br; echo br;
        echo "Telephone Number: " . $telephone ;
    }
?>