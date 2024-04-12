<?php

include '../settings/core.php';
include '../settings/connection.php';
include '../functions/all_categories_fxn.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Home page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background-color: black;
    color:black;
    padding-top: 70px;
}

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

.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.main{
    position:relative;
    background:black;
    width:100%;
    padding:1rem;
}


.header-wrapper{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap: wrap;
    background: #fff;
    border-radius: 10px;
    padding:10px 2rem;
    margin-bottom: 1rem;
}


.header-title{
    color:black;
}


.user-info{
    display:flex;
    align-items:center;
    gap:1rem;
}


.statistics-container{
    background:#fff;
    padding:2rem;
    border-radius: 10px;;

}


.statistics-wrapper{
    display:flex;
    justify-content:space-around;
    width:100%;
    height:30%;
    gap:1rem;

}



.main-title{
    color:black;
    padding-bottom:10px;
    font-size:30px;
}


.progress{
    background: rgb(254,226,254);
    border-radius: 10px;
    padding:1.2rem;
    width:250px;
    height:180px;
    display:flex;
    flex-direction:column;
    justify-content: space-between;
    transition: all 0.5s ease-in-out;
    color: black;
}


.progress .progress-header .stats-value .title{
    font-size: 1em;
}

.progress .progress-header  .value{
    font-size: 1em;
}




.progress:hover{
    transform:translateY(-5px);
}


.progress-title{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    color:rgba(113,99,186,255);

}


.stats-value{
    display:flex;
    flex-direction: column;
}


.title{
    font-size:12px;
    font-weight:200;

}




  </style>
</head>
<body>


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
                    <a href="../views/quiz.php">Quiz</a>
                    <a href="../login/logout.php">logout</a>
                    
                </div>
            </div>
        </div>
    </header>


    



    <!--main bar-->
    <div class="main">
    <div class="header-wrapper">
        <div class="header-title">
            <span>Welcome</span>
        <h2>Dashboard</h2>
        </div>

        <div class="user-info">
        <?php
           

            

            if (isset($_SESSION['user_id'])) {
                $id = $_SESSION['user_id'];
                //find the username from users table using the id
                
                $query = "SELECT username
                FROM users
                WHERE user_id = '$id'";

                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);

                echo '<h3>Welcome '. $row['username'].'</h3>';

                
                
            } else {
                // Handle the case when user information is not available
                echo "<span>Welcome</span>";
            }

            

            ?>
    </div>
    </div>



    <!--statistics table of the various categories-->
    <div class="statistics-container">
        <h1 class="main-title">Watchlist categories</h1>
        <div class="statistics-wrapper">
            

        <?php
                        if ($var_data !== null) {
                            foreach ($var_data as $data) {
            echo '<div class="progress">';
              echo ' <div class="progress-header">';
                  echo '  <div class="stats-value">';
                   echo '     <span class="title"><h4><strong>' .$data['category']. '</strong><h4></span>';
                    echo '</div>';
                     
                    
                echo '</div>';
              echo '</div>';
                            }
                        }
                        ?>
            

             
        </div>
    </div>






</body>
</html>
