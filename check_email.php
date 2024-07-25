<?php
error_reporting(0);

require_once("includes/connection.php");

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    
    if(empty($email)){
        echo"<script>alert('Error ! You must fill all filds')</script>";
    }
    else{
        $select="SELECT statuz FROM request WHERE email='$email'";
        $query=mysqli_query($con,$select);
        $ray=mysqli_fetch_array($query);
        $statuz=$ray['statuz'];

        if($statuz=='paid'){
            header("location:books/computer.php");
        }
        
        else{
            echo"<script>alert('Error ! Please fill the request form and perfom payment to read')</script>";

            // echo"<script>alert('Error ! wrong username or password')</script>";
            header("location:more.php");
        } 
    }
} 

?>