<?php
error_reporting(0);

require_once("includes/connection.php");

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    if(empty($email)||empty($password)){
        echo"<script>alert('Error ! You must fill all filds')</script>";
    }
    else{
        $select="SELECT passwordz,userType FROM users WHERE email='$email'";
        $query=mysqli_query($con,$select);
        $ray=mysqli_fetch_array($query);
        $paw=$ray['passwordz'];
        $utype=$ray['userType'];

        if(password_verify($password,$paw)){
            if($utype=="user"){
                session_start();
                $_SESSION['user']=$email;
                header("location:watumiaji/nyumbani.php");
            }
            elseif($utype=="Admin"){
                session_start();
                $_SESSION['Admin']=$email;
                header("location:utawala/home.php");
            }
            
            else{
                $errorzz="Something is wrong";
            }
        }
        else{
            echo"<script>alert('Error ! wrong username or password')</script>";
            header("location:index.php#login");
        } 
    }
} 

?>