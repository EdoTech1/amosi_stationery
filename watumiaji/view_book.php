<?php
session_start();
if (empty($_SESSION['user'])) {
    header("location:../ingia.php");
}
$mybid = $_GET['x'];
require_once("../includes/connection.php");
    $vuta = "SELECT * FROM book WHERE bid = '$mybid'";
    $sql = mysqli_query($con, $vuta);
    $me = mysqli_fetch_array($sql);
        $bname = $me['bname'];
        $author = $me['author'];
        $book = $me['book'];
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
        <div class="container py-4 py-xl-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-8 text-center mx-auto">
                    <h2><?php echo $bname; ?></h2>
                    <p><?php echo 'By '.$author; ?></p>
                    <?php 
                        echo "<iframe frameborder='0' scrolling='no' style='border:0px' src='../assets/img/books/41957.pdf' width='100%' height='700'></iframe>";
                        
                        $filePath = '../assets/img/books/41957.pdf';

                        // Check if the file exists
                        if (file_exists($filePath)) {
                            // Set the appropriate content type header for PDF
                            header('Content-Type: application/pdf');

                            // Set the content-disposition to inline to display the PDF in the browser
                            header('Content-Disposition: inline; filename="41957.pdf"');

                            // Read the file and output it to the browser
                            readfile($filePath);
                        } else {
                            // Display an error message if the file doesn't exist
                            echo "File not found.";
                        }
                    ?>

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