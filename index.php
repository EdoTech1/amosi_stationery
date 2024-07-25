<?php
// error_reporting(0);

// $y = base64_decode($_GET['y']);
// if(isset($y)){
//     echo"<script>alert('Success ! $y')</script>";
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Amosi Stationery</title>
    <meta name="description" content="Amosi Stationery">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic&amp;display=swap">
    <link rel="stylesheet" href="assets/css/swiper-icons.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/aos.min.css">
    <link rel="stylesheet" href="assets/css/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Details-icons.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="57">
    <?php include_once("includes/top.php")?>
    <header id="home" style="background-color: antiquewhite;">
        <div class="simple-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background: url(&quot;assets/img/slid/11.jpg&quot;) center center / cover no-repeat;"></div>
                    <div class="swiper-slide" style="background: url(&quot;assets/img/slid/12.jpg&quot;) center center / cover no-repeat;"></div>
                    <div class="swiper-slide" style="background: url(&quot;assets/img/slid/13.jpg&quot;) center center / cover no-repeat;"></div>
                    <div class="swiper-slide" style="background: url(&quot;assets/img/slid/14.jpg&quot;) center center / cover no-repeat;"></div>
                    <div class="swiper-slide" style="background: url(&quot;assets/img/slid/15.jpg&quot;) center center / cover no-repeat;"></div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <div class="container">
        <div class="row mb-3 mt-4">
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-primary"> News</h5>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                        <?php
                                require_once("./includes/connection.php");
                                $vuta = "SELECT * FROM news ORDER BY `news`.`createdDate` DESC";
                                $sql = mysqli_query($con,$vuta);
                                while($me = mysqli_fetch_array($sql)){
                                    $nid = $me['nid'];
                                    $news = $me['news'];
                                    $ntype = $me['ntype'];
                                    $date = $me['createdDate'];
                                    
                                    $maxLength = 50;
                                    if (strlen($news) > $maxLength) {
                                        $news = substr($news, 0, $maxLength) . '...' . "<a href='news.php?x=$nid' <span class='bg-info btn-sm text-lowercase' style='font: size 12px;'> Read more ></span></a>";
                                    }

                                    echo "
                                    <div class='col-lg-2'>
                                        <img class='' src='assets/img/cover/new.gif' width='50'>
                                    </div>
                                    <div class='col-lg-10'>
                                            <div class='align-items-center'><span class='small text-muted'>$date</span>
                                                <p>$news</p>
                                                
                                            </div> <br>
                                            
                                    </div>";
                                }
                                ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="col offset-lg-8 text-center mx-auto">
                    <h2 class=" section-heading">Wellcome to Amosy Stationery</h2>
                    <hr class="dark my-4">
                    <p class="mb-4">Your One-Stop Destination for Quality Stationery Products and Services. Explore our wide range of Stationery items, professional printing solutions, creative graphics design, internet services, enriching computer short courses, and a diverse collection of books
                        </p><a class="btn btn-primary btn-xl" role="button" href="#services">Explore our Services</a>
                </div>
            </div>
        </div>
    </div>
    </header>
    
    <section id="about" class="bg-primary">
        
        <div class="container">
            <div class="row">
                <div class="col offset-lg-8 text-center mx-auto">
                    <h2 class="text-white section-heading">We've got what you need!</h2>
                    <hr class="light my-4">
                    <p class="text-faded mb-4">Amosy Stationery has evolved into a hub for all things imaginative and productive. Our mission is to provide top-notch products and services that empower individuals and businesses to excel. We take pride in our curated collection of Stationery products, our cutting-edge design solutions, our reliable internet services, our transformative computer courses, and our thoughtfully selected books that cater to diverse tastes
                    </p>
                    <a class="btn btn-light btn-xl" role="button" href="#services">Get Started With Us!</a>
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="my-4">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="mx-auto service-box mt-5"><i class="fa fa-paint-brush fa-4x text-primary mb-3 sr-icons" data-aos="zoom-in" data-aos-duration="200" data-aos-once="true"></i>
                        <h3 class="mb-3">Graphics Design</h3>
                        <p class="text-muted mb-0">Our creative design team crafts visually striking graphics that capture the essence of your brand. Elevate your business identity with captivating logos, branding materials, and eye-catching designs.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="mx-auto service-box mt-5"><i class="fa fa-laptop fa-4x text-primary mb-3 sr-icons" data-aos="zoom-in" data-aos-duration="200" data-aos-delay="200" data-aos-once="true"></i>
                        <h3 class="mb-3">Computer Courses</h3>
                        <p class="text-muted mb-0">Empower yourself with our hands-on computer short courses. From basic computer literacy to advanced software skills, our courses are designed to equip you with practical knowledge.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="mx-auto service-box mt-5"><i class="fa fa-print fa-4x text-primary mb-3 sr-icons" data-aos="zoom-in" data-aos-duration="200" data-aos-delay="400" data-aos-once="true"></i>
                        <h3 class="mb-3">Printing Solution</h3>
                        <p class="text-muted mb-0">Transform your ideas into tangible realities with our professional printing services. From business materials to promotional items, we offer a wide range of printing options tailored to your needs.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="mx-auto service-box mt-5"><i class="fa fa-book fa-4x text-primary mb-3 sr-icons" data-aos="fade" data-aos-duration="200" data-aos-delay="600" data-aos-once="true"></i>
                        <h3 class="mb-3">Online Bookstore</h3>
                        <p class="text-muted mb-0">Explore literary worlds with our book recommendations. From classic novels to contemporary gems, our reviews and lists are your gateway to captivating reads</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio" class="p-0">
        <div class="container-fluid p-0">
            <div class="row g-0 popup-gallery">
                <div class="col-sm-6 col-lg-3 p-3">
                    <div class="card">
                        <img src="assets/img/cover/22.jpg" alt="" class="card-img-top">
                        <div class="card-body">
                            <div class="card-text">
                                <div class="text-dark"><span><b>Author</b> : Mwl. Amosi Franco Nzunda</span></div>
                                <div class=""><span><b>Title</b> : JIFUNZE KOMPYUTA KWA LUGHA YA KISWAHILI</span></div>
                                <div class="text-dark">
                                <div style="float:left"><span><b>Price</b> : 50,000/= Tsh</span></div>
                                <div style="float:right"><a href="more.php" class="btn bg-primary text-light btn-sm text-lowercase">View Book</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 p-3">
                    <div class="card">
                        <img src="assets/img/cover/22.jpg" alt="" class="card-img-top">
                        <div class="card-body">
                            <div class="card-text">
                                <div class="text-dark"><span><b>Author</b> : Mwl. Amosi Franco Nzunda</span></div>
                                <div class=""><span><b>Title</b> : JIFUNZE KOMPYUTA KWA LUGHA YA KISWAHILI</span></div>
                                <div class="text-dark">
                                <div style="float:left"><span><b>Price</b> : 50,000/= Tsh</span></div>
                                <div style="float:right"><a href="more.php" class="btn bg-primary text-light btn-sm text-lowercase">View Book</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 p-3">
                    <div class="card">
                        <img src="assets/img/cover/22.jpg" alt="" class="card-img-top">
                        <div class="card-body">
                            <div class="card-text">
                                <div class="text-dark"><span><b>Author</b> : Mwl. Amosi Franco Nzunda</span></div>
                                <div class=""><span><b>Title</b> : JIFUNZE KOMPYUTA KWA LUGHA YA KISWAHILI</span></div>
                                <div class="text-dark">
                                <div style="float:left"><span><b>Price</b> : 50,000/= Tsh</span></div>
                                <div style="float:right"><a href="more.php" class="btn bg-primary text-light btn-sm text-lowercase">View Book</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 p-3">
                    <div class="card">
                        <img src="assets/img/cover/22.jpg" alt="" class="card-img-top">
                        <div class="card-body">
                            <div class="card-text">
                                <div class="text-dark"><span><b>Author</b> : Mwl. Amosi Franco Nzunda</span></div>
                                <div class=""><span><b>Title</b> : JIFUNZE KOMPYUTA KWA LUGHA YA KISWAHILI</span></div>
                                <div class="text-dark">
                                <div style="float:left"><span><b>Price</b> : 50,000/= Tsh</span></div>
                                <div style="float:right"><a href="more.php" class="btn bg-primary text-light btn-sm text-lowercase">View Book</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="text-white bg-dark">
        <div class="container text-center">
            <h2 class="mb-4">Lorem Ipsum!</h2><a class="btn btn-light btn-xl sr-button" role="button" data-aos="zoom-in" data-aos-duration="400" data-aos-once="true" href="#">Download Now!</a>
        </div>
    </section> -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center mx-auto">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="my-4">
                    <p class="mb-5">Start with us now. That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
            </div>
        </div>
        <section class="py-4 py-xl-5">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="d-flex flex-column justify-content-center align-items-start h-100">
                            <div class="d-flex align-items-center p-3">
                                <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                    </svg></div>
                                <div class="px-2">
                                    <h6 class="mb-0">Phone</h6>
                                    <p class="mb-0">+255 756 387 356</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center p-3">
                                <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-envelope">
                                        <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                    </svg></div>
                                <div class="px-2">
                                    <h6 class="mb-0">Email</h6>
                                    <p class="mb-0">info@amosistationery.com</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center p-3">
                                <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pin">
                                        <path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354zm1.58 1.408-.002-.001.002.001zm-.002-.001.002.001A.5.5 0 0 1 6 2v5a.5.5 0 0 1-.276.447h-.002l-.012.007-.054.03a4.922 4.922 0 0 0-.827.58c-.318.278-.585.596-.725.936h7.792c-.14-.34-.407-.658-.725-.936a4.915 4.915 0 0 0-.881-.61l-.012-.006h-.002A.5.5 0 0 1 10 7V2a.5.5 0 0 1 .295-.458 1.775 1.775 0 0 0 .351-.271c.08-.08.155-.17.214-.271H5.14c.06.1.133.191.214.271a1.78 1.78 0 0 0 .37.282z"></path>
                                    </svg></div>
                                <div class="px-2">
                                    <h6 class="mb-0">Location</h6>
                                    <p class="mb-0">Vwawa Mbozi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 col-xl-4">
                        <div>
                            <form class="p-3 p-xl-4" method="post">
                                <div class="mb-3"><input class="form-control" type="text" id="name-1" name="name" placeholder="Name"></div>
                                <div class="mb-3"><input class="form-control" type="text" id="name-1" name="name" placeholder="Region"></div>
                                <div class="mb-3"><input class="form-control" type="email" id="email-1" name="email" placeholder="Email"></div>
                                <div class="mb-3"><textarea class="form-control" id="message-1" name="message" rows="6" placeholder="Message"></textarea></div>
                                <div><button class="btn btn-primary d-block w-100" type="submit">Send </button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </section>
    <a href=''></a>
    <footer class="text-center pt-4">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col">
                        <p class="text-muted my-2">Copyright&nbsp;© 2023 Amosi Stationery</p>
                    </div>
                    <div class="col">
                        <ul class="list-inline my-2">
                            <li class="list-inline-item me-4">
                                <div class="bs-icon-circle bs-icon-primary bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                                    </svg></div>
                            </li>
                            <li class="list-inline-item me-4">
                                <div class="bs-icon-circle bs-icon-primary bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                                    </svg></div>
                            </li>
                            <li class="list-inline-item">
                                <div class="bs-icon-circle bs-icon-primary bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                                    </svg></div>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <p class="text-muted my-2">Designed by Noniyaza under EDO TECH</p>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-lg-10">
                    <div class="col bg-primary">
                        <p class="text-light my-2">For Help and Support Contact  System IT. Call 0766 339 711 | 0656 050 874</p>
                    </div>
                </div>
            </div>
        </footer>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/aos.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/baguetteBox.min.js"></script>
    <script src="assets/js/creative.js"></script>
    <script src="assets/js/Simple-Slider-swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>