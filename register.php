<?php
require_once("includes/connection.php");
if(isset($_POST['submit'])){
    $fname = strtoupper(trim(stripslashes(htmlentities(strip_tags(trim($_POST['fname']))))));
    $phone = trim(stripslashes(htmlentities(strip_tags(trim($_POST['phone'])))));
    $email = trim(stripslashes(htmlentities(strip_tags(trim($_POST['email'])))));
    $password = trim(stripslashes(htmlentities(strip_tags(trim($_POST['password'])))));
    $cpassword = trim(stripslashes(htmlentities(strip_tags(trim($_POST['cpassword'])))));
    $psw = password_hash($password,PASSWORD_DEFAULT);

    if(empty($fname)||empty($phone)||empty($email)||empty($password)){
        echo"<script>alert('Error ! You must fill all filds')</script>";
        // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    }
    // elseif(strlen($password)<8){
    //     echo"<script>alert('Error ! Your Password Must Contain At Least 8 Characters!')</script>";
    // }
    // elseif(!preg_match("#[0-9]+#",$password)) {
    //     echo"<script>alert('Error ! Your Password Must Contain At Least 1 Number!')</script>";
    // }
    // elseif(!preg_match("#[A-Z]+#",$password)) {
    //     echo"<script>alert('Error ! Your Password Must Contain At Least 1 Capital Letter!')</script>";
    // }
    // elseif(!preg_match("#[a-z]+#",$password)) {
    //     echo"<script>alert('Error ! Your Password Must Contain At Least 1 Lowercase Letter!')</script>";
    // }
    else{

        // echo $sql; die();
        $sql1 = "INSERT INTO `users`(`fname`, `email`, `phone`, `passwordz`) VALUES ('$fname','$email','$phone','$psw')";
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