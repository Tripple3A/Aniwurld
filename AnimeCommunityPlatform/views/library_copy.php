<?php
// Including the core.php file for session checking
include '../settings/core.php';

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Category Filter in JS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/library.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    </head>

    <style>
        /* CSS styles */

        /* Import font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        /* Reset styles */
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        img {
            width: 100%;
        }
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.5;
            background-color: black;
            color: #fff;
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


        /* Main container */
        .main-container {
            width: 90vw;
            margin: 0 auto;
            padding: 40px 0;
        }
        .main-container > h2 {
            text-align: center;
            padding: 10px 0;
            font-size: 32px;
        }
        .main-container > p {
            font-weight: 300;
            padding: 10px 0;
            opacity: 0.7;
            text-align: center;
        }

        /* Category filters */
        .category-head {
            margin: 30px 0;
        }
        .category-head ul {
            list-style-type: none;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        .category-title {
            flex: 0 0 calc(16.6667% - 10px);
            display: flex;
            justify-content: center;
            background: #a8a8a8;
            padding: 12px;
            color: #fff;
            margin: 5px;
            cursor: pointer;
            transition: all 0.4s ease;
        }
        .category-title:hover {
            opacity: 0.7;
        }
        .category-title li {
            padding: 0 10px;
        }
        .category-title span {
            color: #222;
        }

        /* Posts container */
        .posts-main-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width:180%
        }
        .all.business {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            flex-basis: calc(50% - 20px);
            margin-bottom: 20px;
        }
        .post-img {
            width: 48%; /* Adjust width */
        }
        .post-content {
            width: 48%; /* Adjust width */
        }

        /* Individual post styles */
        .posts-main-container > div {
            box-shadow: 0px 8px 22px -12px rgba(0, 0, 0, 0.64);
        }
        .post-img {
            position: relative;
        }
        .category-name {
            position: absolute;
            top: 20px;
            left: 20px;
            text-transform: uppercase;
            font-size: 13px;
            color: #fff;
            padding: 4px 10px;
            border-radius: 2px;
        }
        .business .category-name {
            background: #00a7ea;
        }
        .post-content {
            padding: 25px;
            width: 48%;
            display: flex; /* Add this line */
    flex-direction: column; /* Add this line to reset flex direction */
        }
        .post-content-top {
            background: #80ced7;
            color: #fff;
            opacity: 0.8;
            padding: 5px 0 5px 15px;
        }
        .post-content-top span {
            padding-right: 20px;
        }
        .post-content-top .fa-comment, .post-content-top .fa-calendar {
            padding-right: 5px;
        }
        .post-content h2 {
            font-size: 22px;
            padding: 12px 0;
            font-weight: 400;
        }
        .post-content p {
            opacity: 0.7;
            font-size: 15px;
            line-height: 1.8;
        }
        .read-btn {
            border: none;
            padding: 8px 15px;
            display: block;
            margin: 5px auto;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            cursor: pointer;
            border: 1px solid #292929;
            margin-bottom: 40px;
        }
        .read-btn:hover {
            background: #f6f6f6;
        }

        /* Media queries */
        @media (max-width: 1170px) {
            .posts-main-container {
                justify-content: center;
            }
            .post-img,
            .post-content {
                width: 100%; /* Adjust width */
            }
        }

        @media (max-width: 768px) {
            .category-title {
                flex: 0 0 calc(33.3333% - 10px); /* Adjust width */
            }
            .posts-main-container {
                grid-template-columns: 1fr;
            }
        }

        /* Active category */
        .active {
            background: #f0544f;
        }
    </style>
    <body>

    <!-- Navigation bar -->
<header>
        <a href="#" class="brand">AniWurld</a>
        <div class="menu-btn">
            <div class="navigation">
                <div class="navigation-items">
                    <a href="#">Home</a>
                    <a href="#">Discover</a>
                    <a href="#">Library</a>
                    <a href="#">Profile</a>
                    <a href="#">Awards</a>
                    <a href="#">Connect</a>
                </div>
            </div>
        </div>
    </header>
        
        <div class = "main-container">
            <h2></h2>
            <h2>Your Anime Categories</h2>
            <p>Organize Your Anime Journey!!</p>
            <div class = "filter-container">
                <div class = "category-head">
                    <ul>
                        <div class = "category-title active" id = "all">
                            <li>Watching</li>
                            <span><i class = "fas fa-border-all"></i></span>
                        </div>
                        <div class = "category-title" id = "culture">
                            <li>Want to Watch</li>
                            <span><i class = "fas fa-theater-masks"></i></span>
                        </div>
                        <div class = "category-title" id = "politics">
                            <li>Watched</li>
                            <span><i class = "fas fa-landmark"></i></span>
                        </div>
                        <div class = "category-title" id = "politics">
                            <li>Add a category</li>
                            <span><i class = "fas fa-landmark"></i></span>
                        </div>
                        
                    </ul>
                </div>

                <div class = "posts-collect">
                    <div class = "posts-main-container">
                        <!-- single post -->
                        <div class = "all business">
                            <div class = "post-img">
                                <img src = "../assets/images/signin-image.jpg" alt = "post">
                                <span class = "category-name">Rate</span>
                            </div>

                            <div class = "post-content">
                                <div class = "post-content-top">
                                    <span><i class = "fas fa-calendar"></i>Reviews</span>
                                    <span>
                                        <i class = "fas fa-comment"></i>34
                                    </span>
                                </div>
                                <h2>Lorem ipsum dolor sit amet</h2>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                     Accusamus recusandae aspernatur possimus illum, repellat 
                                     ad quasi earum, illo voluptatibus minima fugiat saepe magni 
                                     corporis vero eius accusantium quidem, consectetur nesciunt!
                                     noun. knowledge communicated or received concerning a particular fact or circumstance; news: 
                                     information concerning a crime. knowledge gained through study, 
                                     communication, research, instruction, etc.; factual data: His wealth of
                                      general information is amazing.noun. knowledge communicated or received concerning a particular fact or circumstance; news: information concerning a crime. knowledge gained through study, communication, research, instruction, etc.; 
                                      factual data: His wealth of general information is amazing.</p>
                                      <div><button type = "button" class = "read-btn">Review</button>
                                      <button type = "button" class = "read-btn">Rate</button>
                                    </div>
                            </div>
                            
                        </div>
                        <!-- end of single post -->
                        
                    </div>
                </div>
            </div>
        </div>
        

        <!-- JS file -->
        
</html>