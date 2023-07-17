<?php
session_start();
$con=mysqli_connect("localhost","root","","Session");

if(!isset($_SESSION['USER_ID']))
{
    header("location: login.php");
    die;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hi 
        <?php echo $_SESSION['USER_NAME']; ?>
    </h1>

    <a href="logout.php">Log Out</a>
</body>
</html>