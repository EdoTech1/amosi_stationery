<?php
$email = $_GET['x'];
require_once("includes/connection.php");

$sql = "UPDATE users SET statuz = 'active' WHERE email = '$email'";
$query = mysqli_connect($con, $sql);
if($query){
    $y = base64_encode("You are succussfull activate your account. Now you can login.");
    header("location:ingia.php?y=$y");
}
else{
    $x = base64_encode("Something is wrong. Please try again");
    header("location:ingia.php?y=$x");
}

?>