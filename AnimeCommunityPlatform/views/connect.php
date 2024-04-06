<?php
// Including the core.php file for session checking
include '../settings/core.php';

?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Connect page</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap" rel="stylesheet">
                        
        <link rel="stylesheet" href="../assets/css/connect_styles/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/css/connect_styles/bootstrap-icons.css">

        <link rel="stylesheet" href="../assets/css/connect_styles/owl.carousel.min.css">
        
        <link rel="stylesheet" href="../assets/css/connect_styles/owl.theme.default.min.css">

        <link href="../assets/css/connect_styles/templatemo-pod-talk.css" rel="stylesheet">
        
<!--

TemplateMo 584 Pod Talk

https://templatemo.com/tm-584-pod-talk

-->


<!--Header style-->

<style>
    header {
    z-index: 999;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 200px;
    transition: 0.5s ease;
    background-color: #41403d; /* Added background color */
}

header .brand {
    color: #fff;
    font-size: 1.5rem;
    font-weight: 700;
    text-transform: uppercase;
    text-decoration: none;
}

header .brand:hover {
    color: #09a6d4;
}

header .navigation {
    position: relative;
}

header .navigation .navigation-items a {
    position: relative;
    color: #fff;
    font-size: 1em;
    font-weight: 500;
    text-decoration: none;
    margin-left: 30px;
    transition: 0.3s ease;
}

header .navigation .navigation-items a:before {
    content: '';
    position: absolute;
    background: #fff;
    width: 0;
    height: 3px;
    bottom: 0;
    left: 0;
    transition: 0.3s ease;
}

header .navigation .navigation-items a:hover:before {
    width: 100%;
    background: #09a6d4;
}

</style>
    </head>
    
    <body>

        <main>

        <!--Navigation bar-->
    <header>
        <a href="#" class="brand">AniWurld</a>
        <div class="menu-btn">
            <div class="navigation">
                <div class="navigation-items">
                    <a href="#">Home</a>
                    <a href="#">Discover</a>
                    <a href="#">Categories</a>
                    <a href="#">Profile</a>
                    <a href="#">Awards</a>
                    <a href="#">Connect</a>
                    
                </div>
            </div>
        </div>
    </header>

           

            <section class="hero-section">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <div class="text-center mb-5 pb-2">
                                <h1 class="text-white"> with Fellow Anime Enthusiasts </h1>

                                <p class="text-white">Where passion meets friendships</p>

                                <a href="#section_2" class="btn custom-btn smoothscroll mt-3">Connect Beyond Screens</a>
                            </div>

                            <div class="owl-carousel owl-theme">
                                <div class="owl-carousel-info-wrap item">
                                    <img src="../assets/images/cute-smiling-woman-outdoor-portrait.jpg" class="owl-carousel-image img-fluid" alt="">

                                    <div class="owl-carousel-info">
                                        <h4 class="mb-2">
                                            Candice
                                            <img src="../assets/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                                        </h4>

                                        <span class="badge">Storytelling</span>

                                        <span class="badge">Business</span>
                                    </div>

                                    <div class="social-share">
                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-facebook"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="owl-carousel-info-wrap item">
                                    <img src="../assets/images/cute-smiling-woman-outdoor-portrait.jpg" class="owl-carousel-image img-fluid" alt="">

                                    <div class="owl-carousel-info">
                                        <h4 class="mb-2">
                                            William
                                            <img src="../assets/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                                        </h4>

                                        <span class="badge">Creative</span>

                                        <span class="badge">Design</span>
                                    </div>

                                    <div class="social-share">
                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-facebook"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-pinterest"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="owl-carousel-info-wrap item">
                                    <img src="../assets/images/cute-smiling-woman-outdoor-portrait.jpg" class="owl-carousel-image img-fluid" alt="">

                                    <div class="owl-carousel-info">
                                        <h4 class="mb-2">Taylor</h4>

                                        <span class="badge">Modeling</span>

                                        <span class="badge">Fashion</span>
                                    </div>

                                    <div class="social-share">
                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-facebook"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-pinterest"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="owl-carousel-info-wrap item">
                                    <img src="../assets/images/cute-smiling-woman-outdoor-portrait.jpg" class="owl-carousel-image img-fluid" alt="">

                                    <div class="owl-carousel-info">
                                        <h4 class="mb-2">Nick</h4>

                                        <span class="badge">Acting</span>
                                    </div>

                                    <div class="social-share">
                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-instagram"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-youtube"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="owl-carousel-info-wrap item">
                                    <img src="../assets/images/cute-smiling-woman-outdoor-portrait.jpg" class="owl-carousel-image img-fluid" alt="">

                                    <div class="owl-carousel-info">
                                        <h4 class="mb-2">
                                            Elsa
                                            <img src="../assets/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                                        </h4>

                                        <span class="badge">Influencer</span>
                                    </div>

                                    <div class="social-share">
                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-instagram"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-youtube"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="owl-carousel-info-wrap item">
                                    <img src="../assets/images/cute-smiling-woman-outdoor-portrait.jpg" class="owl-carousel-image img-fluid" alt="">

                                    <div class="owl-carousel-info">
                                        <h4 class="mb-2">Chan</h4>

                                        <span class="badge">Education</span>
                                    </div>

                                    <div class="social-share">
                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-linkedin"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-whatsapp"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>





           
        </main>


        
        <!-- JAVASCRIPT FILES -->
        <script src="../js/connect_js/jquery.min.js"></script>
        <script src="../js/connect_js/bootstrap.bundle.min.js"></script>
        <script src="../js/connect_js/owl.carousel.min.js"></script>
        <script src="../js/connect_js/custom.js"></script>

    </body>
</html>
