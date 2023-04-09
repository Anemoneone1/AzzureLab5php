<?php 
    if(isset($_POST['createTable'])) {
    echo "createTable() called\n";
    $tableSize = (int)$_POST["tableSize"];
    if (!is_numeric($tableSize)) {
        echo "Inserted value is not a number. Using 7 as default.\n";
        $tableSize = 7;
    }
    else if ($tableSize > 20 || $tableSize < 5) {
        echo "Inserted value is out of bounds. Using 7 as default.\n";
        $tableSize = 7;
    }

    echo $tableSize . "\n";

    $numbers = array();
    for ($i = 0; $i <= $tableSize; $i++) {
        array_push($numbers, rand(1, 99));
    }

    echo "numbers: " . implode(",", $numbers) . "\n";

    echo "<table>";
    for ($i = 0; $i <= $tableSize; $i++) {
        echo "<tr>";
        for ($j = 0; $j <= $tableSize; $j++) {
            echo "<td";
            if ($i == 0 && $j == 0) {
                echo "";
            }
            else if ($i == 0 || $j == 0) {
                echo ' class="header"';
            }
            else {
                $cell = $numbers[$i] * $numbers[$j];
                if ($cell % 2 == 0) {
                    echo ' class="even"';
                }
            }
            echo ">";
            if ($i == 0 && $j == 0) {
                echo "";
            }
            else if ($i == 0) {
                echo $numbers[$j];
            }
            else if ($j == 0) {
                echo $numbers[$i];
            }
            else {
                echo $cell;
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<script>console.log(" . 8 . ")</script>";
} 
?>

<?php
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $zip = $_POST['zip'];
        $price = $_POST['price'];
        
        if(empty($name) || empty($type) || empty($zip) || empty($price)) {
            echo "Please fill in all fields";
        } else {
            if(!is_numeric($zip) || !is_numeric($price)) {
                echo "Zip code and price must be numbers";
            } else {
                echo "Name: " . $name . "<br>";
                echo "Type: " . $type . "<br>";
                echo "Zip code: " . $zip . "<br>";
                echo "Price: $" . $price;
            }
        }
    }
?>



<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css.css"/>
    <title>lab07</title>
</head>
<body>
    <form method="post">
    <input placeholder="Write the number of rows and columns" type="number" id="tableSize" name="tableSize">
    <input type="submit" name="createTable" value="Create table">
    </form>
    <div id="alert"></div>
    <div id="tableContainer"></div>
    
    <form action="" method="post">
    Name: <input type="text" name="name"><br>
    Type: <select name="type">
        <option value="Desktop">Desktop</option>
        <option value="Laptop">Laptop</option>
        <option value="Monitor">Monitor</option>
        <option value="Keyboard">Keyboard</option>
        <option value="Mouse">Mouse</option>
    </select><br>
    Zip code: <input type="text" name="zip"><br>
    Price: <input type="text" name="price"><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>