<?php

include ('../settings/connection.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



//*Receiving all input value from the form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $animeId = $_POST["anime_id"];
    


    // Retrieve the id of the user currently logged in
    $userId = $_SESSION['user_id'];


    //Deleting the anime from the user_anime table using the anime id
    $query = "DELETE FROM user_animes WHERE user_id = '$userId' AND anime_id = '$animeId'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Error deleting record: ". mysqli_error($connection));
    }


    //Deleting the anime from the animes table using the anime_id parameter
    $query = "DELETE FROM animes WHERE anime_id = '$animeId'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Error deleting record: ". mysqli_error($connection));
    }
    else{
        $success_message = 'Anime was deleted successfully';
        echo json_encode(array('success' => $success_message));
        //header("Location:../views");
        //exit();

    }


    
    

    }


    
    





?>