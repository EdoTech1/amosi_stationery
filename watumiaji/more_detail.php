<?php
session_start();
if (empty($_SESSION['user'])) {
    header("location:../ingia.php");
}
$bd = $_GET['x'];
require_once("../includes/connection.php");
$vuta = "SELECT * FROM book WHERE bid='$bd'";
$sql = mysqli_query($con,$vuta);
$me = mysqli_fetch_array($sql);
    $bid = $me['bid'];
    $bname = $me['bname'];
    $btype = $me['btype'];
    $author = $me['author'];
    $disc = $me['dicription'];
    $price = $me['price'];
    $cover = $me['cover'];

    if(isset($_POST['submit'])){
        $phone = trim(stripslashes(htmlentities(strip_tags(trim($_POST['phone'])))));
        $email = $_SESSION['user'];
        $uniki = $email.$bid;
    
        if(empty($phone)){
            echo"<script>alert('Error ! You must fill all filds')</script>";
        }
        else{
            $sql1 = "INSERT INTO `request`(`bid`, `email`, `uniki`, `phone`) VALUES ('$bid','$email','$uniki','$phone')";
            $query1 = mysqli_query($con,$sql1);
            if($query1){
                $succe ="Your have success to request a book";
                // header("location:index.php#portfolio?y=$y");
            }
            else{
                $error = "Fail to request. You have already request this book";
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
        <div class="row gy-4 gy-md-0">
            <div class="col-md-6">
                <div class="p-xl-5 m-xl-5">
                    <?php echo"<img class='card-img-top w-100 d-block fit-cover' style='height: 500px;' src='../assets/img/books/$cover' />" ?>
                </div>
            </div>
            <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                <div style="max-width: 350px;">
                    <h2 class="text-uppercase fw-bold"><?php echo $bname;?><br>By <br><?php echo $author;?><br></h2><h3><?php echo $btype;?></h3><br>
                    <h2><?php echo $price.'/=Tsh';?></h2>
                    <p class="my-3"><?php echo $disc;?></p>
                    <a class="btn btn-primary btn-lg me-2" data-toggle="modal" data-target="#myModal" role="button" href="more_detail.php#confirm">Request Book</a>
                    <a class="btn btn-outline-primary btn-lg" role="button"  data-toggle="modal" data-target="#myModall" href="#">Read</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" id='confirm'>
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-4 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url('../assets/img/books/2.jpg');"></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="p-5">
                                <div class="">
                                    <h4 class="text-dark mb-4">How to request a book</h4>
                                    <p>
                                        <ol>
                                            <li>Confirm the request -></li>
                                            <li>You Will receive confirmation sms that "we receive your request"</li>
                                            <li>Make payment through the peyment number <b>5485257</b><br>
                                            <img src="../assets/img/pic/lipa.jpeg" alt="" width="80%">
                                            </li>
                                            <li>Book will be open within 10 min</li>
                                            <li>Go back to <b>My book</b> you will see your book is added </li>
                                            
                                        </ol>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Request Book Confirmation</h4>
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
                                <div class="mb-3"><input id="exampleInputPassword" required="required" maxlength="10" class="form-control form-control-user" type="number" placeholder="Enter payment Phone #..." name="phone" /></div>
                                    <p> <input type="checkbox" name="check" required="required"> Confirm the request of the book title <?php echo $bname;?> of <?php echo $author;?> by pay <?php echo $price.'/= Tsh';?>.</p>
                                    <div class="mb-3">
                                    </div><button class="btn btn-primary d-block btn-user w-100" name="submit" type="submit">Confirm</button>
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