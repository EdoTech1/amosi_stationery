<?php
error_reporting(0);
session_start();
if(empty($_SESSION['Admin'])){
    header("location:../ingia.php");
}
function getExtension($str) 
{
      $i = strrpos($str,".");
      if (!$i) 
  { 
  return ""; 
  }
      $l = strlen($str) - $i;
      $ext = substr($str,$i+1,$l);
      return $ext;
}
$errors=0;
require_once("../includes/connection.php");
if(isset($_POST['submit'])){
    $etype = strtoupper(trim(stripslashes(htmlentities(strip_tags(trim($_POST['ename']))))));
    $subject = trim(stripslashes(htmlentities(strip_tags(trim($_POST['subject'])))));
    $year = trim(stripslashes(htmlentities(strip_tags(trim($_POST['year'])))));

    if(empty($etype)||empty($subject)){
        $error = "Error ! You must fill all filds";
    }
    else{
        $image=$_FILES['image']['name'];
        $file=$_FILES['file']['name'];
      if ($image || $file) 
      {
        $filename = $_FILES['image']['name'];
        $extension = getExtension($filename);
        $extension2 = getExtension($filename2);
        if (($extension != "pdf")) 
        {
        $error="Unsupported File extension!";
        }
        else
        {
        $size=filesize($_FILES['image']['tmp_name']);
        if($size>3145728)
        {
        $error="You have exceeded the minimum size limit!";
        }
        }
        $title=rand(10000,99999);
        $name = $title.".".$extension;
        $newname="../assets/img/examination/$name";

        $copied = copy($_FILES['image']['tmp_name'], $newname);
        if($copied){

        $sql1 = "INSERT INTO `mitihani`(`examtype`,`etype`, `subject`, `exam`, `year`) VALUES ('Secondary School','$etype','$subject','$name','$year')";
        // echo $sql1; die();
        $query1 = mysqli_query($con,$sql1);
        if($query1){
            $succe = "You are succussfull to Upload Examination";
        }
        else{
            $error = "Fail to regster";
        }
    }

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
    <?php include_once("../includes/top_admin.php")?>
    
    <div style="margin-left:180px;">
    <br><br>
        <div class="container">
        <p><b>Add Secondary Examination</b></p>

        <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url('../assets/img/pic/logo.PNG'); background-size: cover"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Add Secondary Examination to a Bookstore</h4>
                                </div>
                                <form class="user" method="Post" enctype="multipart/form-data">
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
                                    <div class="mb-3">
                                        <select id="exampleInputPassword" class="form-control form-control-user" name="ename" />
                                            <option value="">Select Class</option>
                                            <option value="Form One">Form One</option>
                                            <option value="Form Two">Form Two</option>
                                            <option value="Form Three">Form Three</option>
                                            <option value="Form Four">Form Four</option>
                                            <option value="Form Five">Form Five</option>
                                            <option value="Form Six">Form Six</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select id="exampleInputPassword" class="form-control form-control-user" type="text" name="subject" />
                                            <option value="">Select Subject</option>
                                            <option value="English">English</option>
                                            <option value="Kiswahili">Kiswahili</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="Physics">Physics</option>
                                            <option value="Biology">Biology</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Civics">Civics</option>
                                            <option value="History">History</option>
                                            <option value="Geograph">Geograph</option>
                                            <option value="Commerce">Commerce</option>
                                            <option value="Bookping">Bookping</option>
                                            <option value="Bible knowledge">Bible knowledge</option>
                                            <option value="Islamic knowledge">Islamic knowledge</option>
                                        </select>
                                    </div>
                                    <div class="mb-3"><input id="exampleInputPassword" class="form-control form-control-user" type="year" placeholder="Enter Year" name="year" /></div>
                                    <div class="mb-3"><input id="exampleInputPassword" class="form-control form-control-user" type="file" placeholder="Enter cover letter..." name="image" />
                                    <span style="color:red">* Upload pdf Examination file</span></div>
                                    <div class="mb-3">
                                    </div><button class="btn btn-primary d-block btn-user w-100" name="submit" type="submit">Upload Book</button>
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