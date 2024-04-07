<?php

// Including the core.php file for session checking
include '../settings/core.php';
include '../functions/all_categories_fxn.php';
include '../actions/get_each_category.php';

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

        .review-btn {
            border: none;
            padding: 8px 15px;
            display: block;
            margin: 5px auto;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            cursor: pointer;
            border: 1px solid #292929;
            margin-bottom: 40px;
            background-color: #fff;
        }
        .review-btn:hover {
            background: #f6f6f6;
        }
        .delete-btn {
            border: none;
            padding: 8px 15px;
            display: block;
            margin: 5px auto;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            cursor: pointer;
            border: 1px solid #292929;
            margin-bottom: 40px;
            background-color: #fff;
        }
        .delete-btn:hover {
            background: #f6f6f6;
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
            background-color: #fff;
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


        /* CSS styles for the review form */

        #review-form {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 20px;
    border-radius: 10px;
    z-index: 9999;
}
#review-form {
    margin-top: 20px;
}

#submit-review-form {
    max-width: 400px;
    margin: 0 auto;
}

#review-text {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: vertical;
}

#review-text:focus {
    outline: none;
    border-color: #09a6d4;
}

#submit-review-form input[type="submit"] {
    background-color: #09a6d4;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#submit-review-form input[type="submit"]:hover {
    background-color: #07a2cf;
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
                    <?php
                    // Loop through categories retrieved from the database
                    foreach ($var_data as $category) {
                        echo '<div class="category-title" data-category="' . $category['category'] . '">';
                        echo '<li>' . $category['category'] . '</li>';
                        echo '<span><i class="fas fa-theater-masks"></i></span>';
                        echo '</div>';
                    }
                    ?>

                <div class = "category-title" id = "politics">
                            <li>Add a category</li>
                            <span><i class = "fas fa-landmark"></i></span>
              </div>
                </ul>
                </div>

                <div class = "posts-collect">
                    <div id= "anime-container" class = "posts-main-container">
                         <!-- Anime details will be populated here -->
                        
                    </div>
                </div>
            </div>
        </div>


        <!--Hidden review form-->
<div id="review-form" style="display: none;">
    <form id="submit-review-form" >
        <textarea id="review-text" name="review-text" placeholder="Write your review"></textarea>
        <input type="hidden" id="anime-id" name="anime-id" value="">
        <input type="submit" name="submit-review">
    </form>
</div>

        

       <!-- JS file -->
       <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 
    <script>
        $(document).ready(function () {
            // Function to fetch anime details based on category
            function fetchAnimeByCategory(category) {
                
                $.ajax({
                    type: "GET",
                    url: "../actions/get_each_category.php",
                    data: { id: category },
                    success: function (response) {
                        
                        $('#anime-container').html(response); // Populate anime details
                    }
                });
            }

            // Click event for category titles
            $('.category-title').click(function () {
                $('.category-title').removeClass('active'); // Remove active class from all categories
                $(this).addClass('active'); // Add active class to the clicked category
                var category = $(this).data('category'); // Get the category
                fetchAnimeByCategory(category); // Fetch anime details based on category
            });
        });
    </script>


<!--To handle the pop up form for review-->
<script>
// Event delegation for dynamically generated review buttons
$(document).on('click', '.review-btn', function() {
    var animeId = $(this).data('animeid');
    $('#anime-id').val(animeId); // Set anime id in the hidden input field
    // Clear the form fields before showing the review form
    $('#review-form').find('textarea').val('');

    $('#review-form').show(); // Show review form
});

//Submit review form via AJAX
$(document).on('submit', '#submit-review-form', function(e) {
    
   e.preventDefault();
   var formData = $(this).serialize(); // Serialize form data
    $.ajax({
        type: "POST",
        url: "../actions/submit_review.php",
        data: formData,
       success: function(response) {
             //Optionally, handle success response
            console.log("Review submitted successfully");
            $('#review-form').hide(); // Hide review form after submission
        },
        error: function(xhr, status, error) {
           // Optionally, handle error response
           console.error(xhr.responseText);
        }
    });


    // Fetch updated anime details and reviews HTML
    var category = $('.category-title.active').data('category'); // Get the active category
        $.ajax({
            type: "GET",
            url: "../actions/get_each_category.php",
            data: { id: category },
            success: function(response) {
                $('#anime-container').html(response); // Update anime details and reviews section
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    </script>



<script>
    //click event for the delete button
    $(document).on('click', '.delete-btn', function() {
    var animeId = $(this).data('animeid');
    // Send AJAX request to delete the anime from the category
    $.ajax({
        type: "POST",
        url: "../actions/delete_category.php",
        data: { anime_id: animeId },
        success: function(response) {
            // Remove the corresponding anime content from the page
            $('#anime-' + animeId).remove();
            console.log("Anime deleted from category successfully");
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

    </script>
    </body>
        
        
</html>