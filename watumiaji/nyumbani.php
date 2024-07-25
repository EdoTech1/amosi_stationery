<?php
session_start();
if (empty($_SESSION['user'])) {
    header("location:../ingia.php");
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
<?php include_once('../includes/top_user.php')?>

<div class="content">

    <div style="margin-left:180px;">
        <br><br>
        <div class="content">
            <div class="container py-4 py-xl-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Amosy BookStore</h2>
                    <p>Read and enjoy best book from amosi bookstore.</p>
                </div> 
            </div>
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-6">
    <?php
                                require_once("../includes/connection.php");
                                $vuta = "SELECT * FROM book";
                                $sql = mysqli_query($con,$vuta);
                                $sno=1;
                                while($me = mysqli_fetch_array($sql)){
                                    $bid = $me['bid'];
                                    $bname = $me['bname'];
                                    $btype = $me['btype'];
                                    $author = $me['author'];
                                    $price = $me['price'];
                                    $cover = $me['cover'];

                                    echo "
                                    <div class='col'>
                                    <a href='more_detail.php?x=$bid'>
                                        <div class='card'><img class='card-img-top w-100 d-block fit-cover' style='height: 200px;' src='../assets/img/books/$cover' /></a>
                                            <div class='card-body'>
                                                <p class='text-primary card-text mb-0'>$btype</p>
                                                <h6 class='card-title'>$bname</h6>
                                            </div>
                                        </div>
                                    
                                    </div>";
                                    $sno++;
                                }
                                ?>
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