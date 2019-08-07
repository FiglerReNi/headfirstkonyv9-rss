<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Aliens Abducted Me - Report an Abduction</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Aliens Abducted Me - Report an Abduction</h1>
<?php
require_once 'kapcs.php';

$kapcs = mysqli_connect(HOST, USER, PW, AB);

if (!$kapcs) {
    die(mysqli_connect_error());
}

mysqli_query($kapcs, "SET NAMES utf8");


$query = "SELECT * FROM aliens_abduction ORDER BY date DESC";
$result = mysqli_query($kapcs, $query);
echo "<strong>Other's informations: </strong><br>";
while ($row = mysqli_fetch_array($result)) {
    $date = $row[10];
    echo "<strong>Date: " . $date . "</strong><br>";
    $name = $row[0] . " " . $row[1];
    echo "Name is: " . $name . "<br>";
    $happen = $row[2];
    echo "When did it happen? " . $happen . "<br>";
    $gone = $row[3];
    echo "How long were you gone: " . $gone . "<br>";
    $number = $row[4];
    echo "How many did you see? " . $number . "<br>";
    $describe = $row[5];
    echo "Description: " . $describe . "<br>";
    $do = $row[6];
    echo "The aliens did this: " . $do . "<br>";
    $fang = $row[7];
    echo "Have you seen my dog Fang? " . $fang . "<br>";
    $add = $row[8];
    echo "Other comments: " . $add . "<br>";
    echo "<br>";
}


?>
</body>
</html>


