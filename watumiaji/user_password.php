<?php
error_reporting(0);
session_start();
if (empty($_SESSION['user'])) {
    header("location:../ingia.php");
}
$mtu = $_SESSION['user'];
require_once("../includes/connection.php");
if(isset($_POST['submit'])){
    $password = trim(stripslashes(htmlentities(strip_tags(trim($_POST['password'])))));
    $cpassword = trim(stripslashes(htmlentities(strip_tags(trim($_POST['cpassword'])))));
    $psw = password_hash($password,PASSWORD_DEFAULT);

    if(empty($password)||empty($password)){
        $error = "Error ! You must fill all filds";
    }
    elseif($password!=$cpassword){
        $error = "Error ! New Password and Confirm Password must be equal";
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
        $sql1 = "UPDATE `users` SET `passwordz`='$psw' WHERE email='$mtu'";
        $query1 = mysqli_query($con,$sql1);
        if($query1){
            $succe = "You are succussfull to change Account password";
        }
        else{
            $error = "Fail to regster";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Amosi Stationary</title>
    <meta name="description" content="Amosi Stationary">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/swiper-icons.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/Contact-Details-icons.css">
    <link rel="stylesheet" href="../assets/css/Hero-Clean-Reverse-images.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="../assets/css/left.css">
</head>

<body style="background-color: antiquewhite;">
    <?php include_once("../includes/top_user.php")?>
    
    <div style="margin-left:80px;">
    <br><br>
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url('../assets/img/books/2.jpg');"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Change Password!</h4>
                                </div>
                                <form class="user" method="Post">
                                <span>
                                                    <?php
                                                    if (isset($error)) {
                                                        echo "<div class='alert alert-warning'>
                                                        <strong>Warning!</strong> $error.
                                                        </div>";
                                                    }else if (isset($succe)) {
                                                        echo "<div class='alert alert-success'>
                                                        <strong>Success!</strong> $succe.
                                                        </div>";
                                                    }
                                                    else{
                                                        echo "";
                                                    }
                                                    ?>
                                                </span>
                                    <div class="mb-3"><input id="exampleInputPassword" class="form-control form-control-user" type="password" placeholder="Enter New Password..." name="password" /></div>
                                    <div class="mb-3"><input id="exampleInputPassword" class="form-control form-control-user" type="password" placeholder="Confirm Password..." name="cpassword" /></div>
                                    <div class="mb-3">
                                    </div><button class="btn btn-primary d-block btn-user w-100" name="submit" type="submit">Update Password</button>
                                    <hr/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/baguetteBox.min.js"></script>
    <script src="assets/js/creative.js"></script>
    <script src="assets/js/Simple-Slider-swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>