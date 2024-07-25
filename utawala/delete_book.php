<?php
session_start();
if (empty($_SESSION['Admin'])) {
    header("location:../ingia.php");
}
$nid = $_GET['x'];
require_once("../includes/connection.php");
$sql1 = "DELETE FROM book WHERE bid = '$nid'";
        // echo $sql1; die();
        $query1 = mysqli_query($con,$sql1);
        if($query1){
            header("location:home.php");
        }
        else{
            header("location:home.php");
        }
?>