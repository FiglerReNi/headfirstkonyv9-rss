<?php
include dirname(__FILE__).'/SendMail.php';
?>

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
if (isset($_POST['submit'])) {
    $name = $_POST['fname'] . " " . $_POST['lname'];
    $email = $_POST['email'];
    $happen = $_POST['happen'];
    $gone = $_POST['gone'];
    $number = $_POST['number'];
    $describe = $_POST['describe'];
    $do = $_POST['do'];
    $fang = $_POST['fang'];
    $add = $_POST['add'];
    echo "Thanks for submitting the form. <br>";
    echo "Your name is: " . $name . "<br>";
    echo "Your e-mail address is: " . $email . "<br>";
    echo "When did it happen? " . $happen . "<br>";
    echo "How long were you gone: " . $gone . "<br>";
    echo "How many did you see? " . $number . "<br>";
    echo "Your description: " . $describe . "<br>";
    echo "The aliens did this: " . $do . "<br>";
    echo "Have you seen my dog Fang? " . $fang . "<br>";
    echo "Other comments: " . $add . "<br>";
}

$text = "$name was abducted  $happen and was gone for $gone.\n" .
    "How many did you see: $number\n" .
    "Description: $describe\n" .
    "The aliens did this: $do\n" .
    "Have you seen my dog Fang? $fang\n" .
    "Other comments: $add\n" .
    "E-mail: $email";

/*$to = 'stephany85@gmail.com';
$subject = "Report an Abduction";
mail($to, $subject, $text, 'From:' . $email);*/

$mail = new SendMail($name, $email, $text);
$mail->sendMail();



?>
</body>
</html>