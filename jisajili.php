<?php
error_reporting(0);
require_once("includes/connection.php");
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

// define name spaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
if(isset($_POST['submit'])){
    $fname = strtoupper(trim(stripslashes(htmlentities(strip_tags(trim($_POST['fname']))))));
    $phone = trim(stripslashes(htmlentities(strip_tags(trim($_POST['phone'])))));
    $email = trim(stripslashes(htmlentities(strip_tags(trim($_POST['email'])))));
    $password = trim(stripslashes(htmlentities(strip_tags(trim($_POST['password'])))));
    $cpassword = trim(stripslashes(htmlentities(strip_tags(trim($_POST['cpassword'])))));
    $psw = password_hash($password,PASSWORD_DEFAULT);

    if(empty($fname)||empty($phone)){
        $error = "Error ! You must fill all filds";
    }
    elseif($password!=$cpassword){
        $error = "Error ! Password and Confirm Password must be equal";
    }
    elseif(strlen($password)<8){
        $error = "Error ! Your Password Must Contain At Least 8 Characters";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $error = "Error ! Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $error = "Error ! Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $error = "Error ! Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    else{
        $sql1 = "INSERT INTO `users`(`fname`, `email`, `phone`, `passwordz`) VALUES ('$fname','$email','$phone','$psw')";
        // echo $sql1; die();

        $query1 = mysqli_query($con,$sql1);
        if($query1){
            
              // create instance of phpmailer
            $mail = new PHPMailer();
            // set mailer to use smtp
            $mail->isSMTP();
            // define smtp host
            $mail->Host = "smtp.gmail.com";
            // enable smtp authentication
            $mail->SMTPAuth = "true";
            // set type of encryption (ssl/tls)
            $mail->SMTPSecure = "tls";
            // set port to connect smtp
            $mail->Port = "587";
            // set gmail username
            $mail->Username = "amprogrammer18@gmail.com";
            // set gmail password
            $mail->Password = "vvjyqevdjtutnfwb";
            // add recipient
            $mail->addAddress($email);
            //allow HTML
            $mail->isHTML(true);
            // set email subject
            $mail->Subject = "Account Verification";
            // set sender email
            $mail->setFrom("amprogrammer18@gmail.com", "User Account verification");
            // email body
            // $mail->Body = " <a href='http://localhost/project/voter/active.php?p=$email'>ACTIVATE</a> ";
            // <a href="" style="background-color: blue; color: white; padding: 14px 25px; text-align: center; text-decoration: none; display: inline-block;">Activate Account</a>
            
            $mail->Body = "
            <fieldset style='width: 90%;  margin: 0%;'>
            
            <h2> Congatration Dear $fname </h2>
            <p> You have success create an account click the button below to activate your account. </p> 

            <p><a href='activate.php?x=$email' style='background-color: blue; color: white; padding: 14px 25px; text-align: center; text-decoration: none; display: inline-block;''>Activate Account</a></p> 
            
            
            </fieldset>";
           //alt body
         
            // send email
            $send = $mail->Send();
            if($send){ 
                $y = base64_encode("You are succussfull to create an account. Please login to your email account to accivate your account");
                header("location:ingia.php?y=$y");
            }else{
                $error = "Fail to create an account";
            };
            // close smto connection
            $mail->smtpClose();
            
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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic&amp;display=swap">
    <link rel="stylesheet" href="assets/css/swiper-icons.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Details-icons.css">
    <link rel="stylesheet" href="assets/css/Hero-Clean-Reverse-images.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
</head>

<body style="background-color: antiquewhite;">
    <?php include_once("includes/top.php")?>
    <div class="container  py-4 py-xl-5">
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center mx-auto">
                    <h2 class="section-heading">Sign-Up to get start!</h2>
                    <hr class="my-4">
                    <p class="mb-5">Sign in to start with us Now. To get unlimited futures.</p>
                </div>
            </div>
        </div>
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url('assets/img/pic/regster.jpg');"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Sign-Up!</h4>
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
                                    <div class="mb-3"><input id="exampleInputEmail" class="form-control form-control-user" type="text" aria-describedby="emailHelp" placeholder="Enter Fullname..." name="fname" required /></div>
                                    <div class="mb-3"><input id="exampleInputEmail" class="form-control form-control-user" type="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required/></div>
                                    <div class="mb-3"><input id="exampleInputPassword" class="form-control form-control-user" type="number" placeholder="Enter Phone Number..." name="phone" required /></div>
                                    <div class="mb-3"><input id="exampleInputPassword" class="form-control form-control-user" type="password" placeholder="Enter Password..." name="password" required /></div>
                                    <div class="mb-3"><input id="exampleInputPassword" class="form-control form-control-user" type="password" placeholder="Confirm Password..." name="cpassword" required /></div>
                                    <div class="mb-3">
                                    </div><button class="btn btn-primary d-block btn-user w-100" name="submit" type="submit">Register</button>
                                    <hr/>
                                </form>
                                <div class="text-center"><a class="small" href="ingia.php">I have an Account!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    </section>
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