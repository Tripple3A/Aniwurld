<?php
// Including the core.php file for session checking
include '../settings/core.php';


// Including the get_all_users.php file
include '../actions/get_all_users.php';

// Fetch all users
$users = getAllUsers();
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
                <a href="../views/home.php">Home</a>
                    <a href="../views/discover.php">Discover</a>
                    <a href="../views/library_copy.php">library</a>
                    <a href="../views/profile.php">Profile</a>
                    <a href="../views/awards_page.php">Awards</a>
                    <a href="../views/connect.php">Connect</a>
                    <a href="../login/logout.php">logout</a>
                    
                </div>
            </div>
        </div>
    </header>

           

            <section class="hero-section">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <div class="text-center mb-5 pb-2">
                                <h1 class="text-white" style="color:black;"> Unite with Fellow Anime Enthusiasts </h1>

                                <p class="text-white">Where passion meets friendships</p>

                                <a href="#section_2" class="btn custom-btn smoothscroll mt-3">Connect Beyond Screens</a>
                            </div>

                            <div class="owl-carousel owl-theme">


                            <?php
                        if ($users !== null) {
                            foreach ($users as $user) {
                            echo ' <div class="owl-carousel-info-wrap item">';
                                    // Check if the profile image exists
                                if (!empty($user['photo'])) {
                                    // If the profile image is stored as binary data
                                    $imageData = base64_encode($user['photo']);
                                    $src = 'data:image/jpeg;base64,' . $imageData;
                                    echo "<img src='$src' class='img-fluid' alt='Profile Picture'>";
                                }

                                  echo '  <div class="owl-carousel-info">';
                                   echo '     <h4 class="mb-2">';
                                        
                                   echo $user['username'];
                                     echo'<img src="../assets/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">';
                                      echo'  </h4>';

                                      echo '<span class="badge">' . $user['email'] . '</span>';

                                        
                                    echo '</div>';

                                    echo '<div class="social-share">';
                                     echo '   <ul class="social-icon">';
                                     if (!empty($user['twitter'])){
                                       echo ' <li class="social-icon-item">';
                                       echo '<a href="' . $user['twitter'] . '" class="social-icon-link bi-twitter"><i class="fa fa-twitter" style="font-size:36px"></i></a>';

                                       echo' </li>';
                                     }

                                     if (!empty($user['facebook'])){
                                        echo ' <li class="social-icon-item">';
                                        echo '<a href="' . $user['twitter'] . '" class="social-icon-link bi-twitter"><i class="fa fa-twitter" style="font-size:36px"></i></a>';
 
                                        echo' </li>';
                                      }

                                      if (!empty($user['instagram'])){
                                        echo ' <li class="social-icon-item">';
                                        echo '<a href="' . $user['twitter'] . '" class="social-icon-link bi-twitter"><i class="fa fa-twitter" style="font-size:36px"></i></a>';
 
                                        echo' </li>';
                                      }
                                       echo' </ul>';
                                    echo '</div>';
                               echo ' </div>';
                                    }
                            }

                                ?>
                            
                            
                            
                            
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
