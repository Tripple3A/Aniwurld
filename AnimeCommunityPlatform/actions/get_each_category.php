<?php

include "../settings/connection.php";



if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



function getAnimeIdByCategory($categoryName) {
    global $connection; // Assuming $connection is your database connection

    

    // Retrieve the id of the user currently logged in
    $userId = $_SESSION['user_id'];


    //retrieving the username using userid from users table
    $sql = "SELECT * FROM users WHERE user_id = '$userId'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];

    // Retrieve the category id from the categories table
    $query = "SELECT category_id FROM categories WHERE category = '$categoryName'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $category_id = $row['category_id'];

    // Retrieve the anime id from user_animes table using the category id
    $animeid_query = "SELECT anime_id FROM user_animes WHERE user_id = '$userId' AND category_id = '$category_id'";
    $animeid_result = mysqli_query($connection, $animeid_query);
    


    // Initialize anime_details variable
    $anime_details = '';

    // Loop through retrieved anime details
    while ($anime_row = mysqli_fetch_assoc($animeid_result)) {
        

        $anime_id = $anime_row['anime_id'];
        $anime_query = "SELECT * FROM animes WHERE anime_id = '$anime_id'";
        $anime_result = mysqli_query($connection, $anime_query);
        $anime_data = mysqli_fetch_assoc($anime_result);


        // Fetch reviews for this anime
        $reviews_query = "SELECT * FROM reviews WHERE anime_id = '$anime_id'";
        $reviews_result = mysqli_query($connection, $reviews_query);


        $reviews_html = '';
        // Build reviews HTML
        
        while ($review_row = mysqli_fetch_assoc($reviews_result)) {
            // Append review to HTML
            $reviews_html .= "<p>{$username}: {$review_row['ReviewText']}</p>";
        }
        
        

        // You can customize this HTML markup according to your requirements
        $anime_details .= '<div id="anime-' . $anime_id . '" class="all business">';
        $anime_details .= '<div class="post-img">';
        
        
        $anime_details .= '<img src="' . $anime_data['image_url'] . '" alt="' . $anime_data['title'] . '">';
        $anime_details .= '<span class="category-name">' . $categoryName . '</span>';
        $anime_details .= '</div>';
        $anime_details .= '<div class="post-content">';
        $anime_details .= '<div class="post-content-top">';
        // You need to ensure 'release_date', 'reviews', and 'description' exist in 'animes' table
        // Adjust accordingly if the structure differs
        $anime_details .= '<span><i class="fas fa-calendar"></i></span>';
        $anime_details .= '<span><i class="fas fa-comment">Reviews</i></span>';
        $anime_details .= '</div>';
        $anime_details .= '<h2>' . $anime_data['title'] . '</h2>';
        // You need to ensure 'description' exists in 'animes' table
        // Adjust accordingly if the structure differs
        $anime_details .= $reviews_html;
        $anime_details .= '<div class="btns"><button type="button" class="review-btn" data-animeid="' . $anime_id . '">Review</button>';
        $anime_details .= '<button type="button" class="delete-btn" data-animeid="' . $anime_id . '">Delete from category</button>';
        $anime_details .= '<button type="button" class="update-btn" data-animeid="' . $anime_id . '">Change category</button></div>';
        $anime_details .= '<div class="category-dropdown" style="display: none;">';
        $anime_details .= '<select class="category-select">';
        // Loop through the existing categories to build the options
        include '../functions/all_categories_fxn.php';
        foreach ($var_data as $data) {
        $anime_details .= "<option value='{$data['category']}'>{$data['category']}</option>";
        }
        $anime_details .= '</select>';
        $anime_details .= '</div>';
        $anime_details .= '</div></div>';
    }

    // Combine anime details and reviews HTML
    $anime_details_with_reviews = $anime_details;

    return $anime_details_with_reviews;
}

// Usage 
if(isset($_GET['id'])) {
    $category = $_GET['id'];
    $animeId = getAnimeIdByCategory($category);
    echo $animeId;
    
}
?>






   



