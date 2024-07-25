<?php
require_once("includes/connection.php");
if(isset($_POST['submit'])){
    $fname = strtoupper(trim(stripslashes(htmlentities(strip_tags(trim($_POST['fname']))))));
    $phone = trim(stripslashes(htmlentities(strip_tags(trim($_POST['phone'])))));
    $email = trim(stripslashes(htmlentities(strip_tags(trim($_POST['email'])))));

    if(empty($fname)||empty($phone)){
        echo"<script>alert('Error ! You must fill all filds')</script>";
        // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    }

    else{

        // echo $sql; die();
        $sql1 = "INSERT INTO `request`(`bid`, `email`, `phone`) VALUES ('1','$email','$phone')";
        $query1 = mysqli_query($con,$sql1);
        if($query1){
            $y = base64_encode("You are succussfull to create an account");
            
            header("location:index.php#portfolio?y=$y");
        }
        else{
            $errorzz = "Fail to regster";
        }
    }
}
?>