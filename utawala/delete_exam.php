<?php
session_start();
if (empty($_SESSION['Admin'])) {
    header("location:../ingia.php");
}
$nid = $_GET['x'];
require_once("../includes/connection.php");
$sql1 = "DELETE FROM mitihani WHERE eid = '$nid'";
        // echo $sql1; die();
        $query1 = mysqli_query($con,$sql1);
        if($query1){
            header("location:exam.php");
        }
        else{
            header("location:exam.php");
        }
?>