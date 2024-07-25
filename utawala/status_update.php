<?php
session_start();
if (empty($_SESSION['Admin'])) {
    header("location:../ingia.php");
}
$bid = $_GET['x'];
require_once("../includes/connection.php");
    $vuta = "UPDATE request SET statuz='Paid' WHERE bid = '$bid'";
    $sql = mysqli_query($con, $vuta);
    if($sql){
        header("location:book_request.php");
    }
    else{
        header("location:book_request.php");
    }

?>