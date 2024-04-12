<?php
include "../settings/connection.php";
session_start();

// Check if both category ID and anime ID are provided
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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


    //Getting the current category id for the anime
    $query = "SELECT * FROM user_animes WHERE user_id = '$userId' AND anime_id = '$animeId'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);


    //if the category id is different update to the new category id and exit redirecting back to anime page
    if (!empty($row)) {
    if($row['category_id']!= $categoryId) {
        $query = "UPDATE user_animes SET category_id = '$categoryId' WHERE user_id = '$userId' AND anime_id = '$animeId'";
        mysqli_query($connection, $query);
        $success_message = 'Anime category has been successfully updated';
        echo json_encode(array('success' => $success_message));
        exit();
    }
    //else if they are the same, redirect with a message that the anime is already in that selected category
     else{
        $error_message = 'Anime is already in selected category!!';
        echo json_encode(array('error' => $success_message));
        exit();
     }
    }


}
else{
    // If request method is not POST, send error response
    $error_message = 'Error executing the request!!';
    echo json_encode(array('success' => $error_message));
}



   

    


?>


