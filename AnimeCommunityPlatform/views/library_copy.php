<?php

// Including the core.php file for session checking
include '../settings/core.php';
include_once '../functions/all_categories_fxn.php';
include_once '../actions/get_each_category.php';

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

        .category-add {
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
        .category-add:hover {
            opacity: 0.7;
        }
        .category-add li {
            padding: 0 10px;
        }
        .category-add span {
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
           position:relative; 
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
        .update-btn {
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
        .update-btn:hover {
            background: #f6f6f6;
        }

        /* Updated CSS for button and dropdown container */
.btn-dropdown-container {
    position: relative;
    display: inline-block;
}

/* Show the dropdown menu on hover of the container */
.btn-dropdown-container:hover .category-dropdown {
    display: block;
}


        .category-dropdown {
    display: none;
    position: absolute; /* Change to absolute */
    top: 100%; /* Position below the button */
    left: 0; /* Align with the button */
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 500;
}

.dropdown-item {
            flex: 0 0 calc(16.6667% - 10px);
            display: flex;
            justify-content: center;
            background: #a8a8a8;
            padding: 12px;
            color: black;
            margin: 5px;
            cursor: pointer;
            transition: all 0.4s ease;
        }
        .dropdown-item:hover {
            opacity: 0.7;
        }
        
  
  /* Links inside the dropdown 
  .category-dropdown div {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }*/
  
  /* Change color of dropdown links on hover */
  .category-dropdown div:hover {background-color: #f1f1f1}
  
  /* Show the dropdown menu on hover */
.update-btn:hover + .category-dropdown {
    display: block;
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

/*Css for adding a category form*/
 

 #add-category-form{
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
#add-category-form {
    margin-top: 20px;
}

#add-form{
    max-width: 400px;
    margin: 0 auto;
}

#add-text {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: vertical;
}

#add-text:focus {
    outline: none;
    border-color: #09a6d4;
}

#add-form input[type="submit"] {
    background-color: #09a6d4;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#add-form input[type="submit"]:hover {
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
        
        <div class = "main-container">
            <h2></h2>
            <h2>Your Anime Categories</h2>
            <p>Organize Your Anime Journey!!</p>
            <div class = "filter-container">
                <div class = "category-head">
                <ul>
                    <?php
                    // Loop through categories retrieved from the database
                    $first_category = true; // Initialize a flag to track the first category
        foreach ($var_data as $category) {
            // Add active class to the first category by default
            $active_class = $first_category ? 'active' : '';
            echo '<div class="category-title ' . $active_class . '" data-category="' . $category['category'] . '">';
            echo '<li>' . $category['category'] . '</li>';
            // Modify the delete icon to include a data attribute for category name -->
            echo '<span><a class="delete" title="Delete" data-toggle="tooltip" href="#" data-category="' . $category['category'] . '"><i class="fa fa-trash"></i></a></span>';

            echo '</div>';
            // Set the flag to false after the first category to ensure only one category gets the active class
            $first_category = false;
        }
                    ?>

                <div class = "category-add" id = "adding-category">
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


<!--Hidden form for adding a category-->
<div id="add-category-form" style="display: none;">
    <form id="add-form" >
        <textarea id="add-text" name="add-text" placeholder="Name of category"></textarea>
        <input type="submit" name="submit-category">
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

            // Trigger click event on the first category after the document is ready
    $('.category-title:first').trigger('click');


            // Change event for category dropdown items
        $(document).on('click', '.dropdown-item', function() {
        $('.dropdown-item').removeClass('active');
        $(this).addClass('active');
        var animeId = $(this).data('animeid');
        var newCategory = $(this).data('categoryname'); 
        updateAnimeCategory(animeId, newCategory); // Call function to update category
    });

    // Function to update anime category via AJAX
    function updateAnimeCategory(animeId, newCategory) {
        
        $.ajax({
            type: "POST",
            url: "../actions/change_category.php",
            data: { anime_id: animeId, id: newCategory },
            
            success: function(response) {
                response = JSON.parse(response);
        
            if(response.success){
                alert(response.success); 
                
                // If category updated successfully, fetch updated anime list
                fetchAnimeByCategory($('.category-title.active').data('category'));
            }
            else{
        
            alert(response.error);
        
                
            }
        },
            
        });
    }
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
   console.log(formData);
    $.ajax({
        type: "POST",
        url: "../actions/submit_review.php",
        data: formData,
       success: function(response) {
        response = JSON.parse(response);
        
        if(response.success){
            
            $('#review-form').hide(); // Hide review form after submission
            alert(response.success); 

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
    }else{
        
        alert(response.error);
        $('#review-form').hide();
        

    }
        },
        
    });

    
    });

    </script>



<script>
    //click event for the delete button
    $(document).on('click', '.delete-btn', function() {
    var animeId = $(this).data('animeid');
    // Send AJAX request to delete the anime from the category
    var confirmed = confirm("Are you sure you want to delete this category"); // Prompt confirmation
    if (confirmed) {
    $.ajax({
        type: "POST",
        url: "../actions/delete_category.php",
        data: { anime_id: animeId },
        success: function(response) {

            response = JSON.parse(response);
        
            if(response.success){
                $('#anime-' + animeId).remove();
                alert(response.success); 
            
            }else{
        
        alert(response.error);
    
            
        }

            
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}else {
        // Do nothing if not confirmed
        return false;
    }
});

    </script>

<script>
    // Updated jQuery to handle hover event on the container
$('.btn-dropdown-container').hover(function () {
    $(this).find('.category-dropdown').css('display', 'block');
}, function () {
    $(this).find('.category-dropdown').css('display', 'none');
});



</script>


<!--To handle the pop up form for adding a category-->
<script>
// Event delegation for dynamically generated review buttons
$(document).on('click', '.category-add', function() {
    // Clear the form fields before showing the review form
    $('#add-category-form').find('textarea').val('');

    $('#add-category-form').show(); // Show review form
});

// Submit category form via AJAX
$(document).on('submit', '#add-form', function(e) {
        e.preventDefault();
        var formData = $(this).serialize(); // Serialize form data
        $.ajax({
            type: "POST",
            url: "../actions/add_a_category.php",
            data: formData,
            success: function(response) {
                response = JSON.parse(response);
        
                if(response.name){
                // Hide category form after submission
                $('#add-category-form').hide();
                // Parse JSON response to get the newly added category data
                alert("Category was added successfully");
                var newCategory = response;
                // Dynamically append the new category to the category list
                $('.category-head ul').append('<div class="category-title" data-category="' + newCategory.name + '"><li>' + newCategory.name + '</li><span><a class="delete" title="Delete" data-toggle="tooltip" href="#" data-category="' + newCategory.name + '"><i class="fa fa-trash"></i></a></span></div>');
            }else{
        
        alert(response.error);
        $('#add-category-form').hide();
    
            
        }

            },
            error: function(xhr, status, error) {
                // Optionally, handle error response
                console.error(xhr.responseText);
            }
        });
    });

    </script>



<!--script for deleting a category-->
<script>
    // Click event for delete icon
$(document).on('click', '.delete', function(e) {
    e.preventDefault();
    var category = $(this).data('category'); // Get the category name
    var confirmed = confirm("Are you sure you want to delete this category"); // Prompt confirmation
    // Send AJAX request to delete the category
    if (confirmed) {
    $.ajax({
        type: "POST",
        url: "../actions/delete_a_category.php",
        data: { category: category }, // Send category name to backend
        success: function(response) {
            response = JSON.parse(response);
        
                if(response.success){
            alert(response.success);
            // Remove the deleted category from the frontend
            $('.category-title[data-category="' + category + '"]').remove();
            
                }else{
        
        alert(response.error);
        $('#add-category-form').hide();
    
            
        }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
else {
        // Do nothing if not confirmed
        return false;
    }
});


</script>






    </body>
        
        
</html>