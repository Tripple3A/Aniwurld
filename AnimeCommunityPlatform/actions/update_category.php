<?php
include "../settings/connection.php";
session_start();

//*Receiving all input value from the form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // Retrieve category ID and anime ID
    $category = $_POST['id'];
    $animeId = $_POST['anime_id'];


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
        $success_message = 'Anime category was successfully updated!!';
        echo json_encode(array('success' => $success_message));
        exit();
    }
    //else if they are the same, redirect with a message that the anime is already in that selected category
     else{
        $success_message = 'Anime already in selected category!!';
        echo json_encode(array('success' => $success_message));
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


    //lets first check if the anime id exists in the animes table
    $query = "SELECT * FROM animes WHERE anime_id = '$animeId'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    //if the anime id does not exist in the animes table, add the anime to the database
    if (empty($row)) {
        //Insert the anime into the animes table
        $query = "INSERT INTO animes (anime_id, image_url, title) VALUES ('$animeId', '$image', '$title')";
        mysqli_query($connection, $query);
        $success_message = 'Anime added successfuly to category!!';
        echo json_encode(array('success' => $success_message));
        exit();
        
    }

    $success_message = 'Registration was successful!!';
     echo json_encode(array('success' => $success_message));
    


    


}



   

    


?>


