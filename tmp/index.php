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

mysqli_query($kapcs,"SET NAMES utf8");

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $happen = $_POST['happen'];
    $gone = $_POST['gone'];
    $number = $_POST['number'];
    $describe = $_POST['describe'];
    $do = $_POST['do'];
    $fang = $_POST['fang'];
    $add = $_POST['add'];
    echo "Thanks for submitting the form. <br>";
    echo "Your name is: " . $fname . " " . $lname . "<br>";
    echo "Your e-mail address is: " . $email . "<br>";
    echo "When did it happen? " . $happen . "<br>";
    echo "How long were you gone: " . $gone . "<br>";
    echo "How many did you see? " . $number . "<br>";
    echo "Your description: " . $describe . "<br>";
    echo "The aliens did this: " . $do . "<br>";
    echo "Have you seen my dog Fang? " . $fang . "<br>";
    echo "Other comments: " . $add . "<br>";
}
$qurey = "INSERT INTO aliens_abduction 
          (first_name, last_name, when_it_happend, how_long, how_many, alien_description, what_they_did, fang_spotted, other, email, date)
	      VALUES 
	      ('$fname', '$lname', '$happen', '$gone', '$number', '$describe', '$do', '$fang', '$add', '$email', NOW())";

$result = mysqli_query($kapcs, $qurey) or die('Sikertelen lekérdezés');

mysqli_close($kapcs);
?>
</body>
</html>