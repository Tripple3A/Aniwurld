<?php
include "../settings/connection.php";
session_start();

// Check if both category ID and anime ID are provided
if(isset($_GET['id']) && isset($_GET['anime_id'])) {
    // Retrieve category ID and anime ID
    $category = $_GET['id'];
    $animeId = $_GET['anime_id'];


    //Retrieve the id of the user currently logged in
    $userId = $_SESSION['user_id'];


    //Retrieve the id of the category using the category name
    $category_query = "SELECT category_id FROM categories WHERE category = '$category'";
    $category_result = mysqli_query($connection, $category_query);
    $category_row = mysqli_fetch_assoc($category_result);
    $categoryId = $category_row['category_id'];


    //First check if the user already has the anime under a different category
    $query = "SELECT * FROM user_animes WHERE user_id = '$userId' AND anime_id = '$animeId'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);


    //if the category id is different update to the new category id and exit redirecting back to anime page
    if (!empty($row)) {
    if($row['category_id']!= $categoryId) {
        $query = "UPDATE user_animes SET category_id = '$categoryId' WHERE user_id = '$userId' AND anime_id = '$animeId'";
        mysqli_query($connection, $query);
        header("Location:../views/discover.php");
        exit();
    }
    //else if they are the same, redirect with a message that the anime is already in that selected category
     else{
        echo "Anime already in selected category";
        header("Location:../views/discover.php");
        exit();
     }
    }



    //if the user does not have the anime in the selected category, add the anime to the database
        $query = "INSERT INTO user_animes (user_id, anime_id, category_id) VALUES ('$userId', '$animeId', '$categoryId')";
        mysqli_query($connection, $query);
        
        
        



    //Retrieving the image of the anime from the api 
    $url = 'https://api.jikan.moe/v4/anime/'.$animeId;
    $response = file_get_contents($url);
    $animeData = json_decode($response, true);


    // Check if data is retrieved successfully
    if($animeData && isset($animeData['data'])) {
        $anime = $animeData['data'];
        $image = $anime['images']['jpg']['large_image_url'];
        echo $image;
        $title = $anime['title'];
    
    }


    //Insert the anime into the animes table
    $query = "INSERT INTO animes (anime_id, image_url, title) VALUES ('$animeId', '$image', '$title')";
    mysqli_query($connection, $query);
    echo "Anime added successfully";
    header("Location:../views/discover.php");
    exit();


}



   

    


?>


