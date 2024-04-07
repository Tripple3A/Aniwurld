<?php

include ('../settings/connection.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}






//*Receiving all input value from the form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $errors = array();


    // Retrieve the id of the user currently logged in
    $userId = $_SESSION['user_id'];
    
    //receive all input values from the form
    

    $review = mysqli_real_escape_string($connection, $_POST['review-text']);
    $animeid = mysqli_real_escape_string($connection, $_POST['anime-id']);


    //would need to ensure user does not submit empty review
    if(empty($review)){
        array_push($errors, "Please enter a review");
    }



    //would need tp validate that the review is not a number
    if(is_numeric($review)){
        array_push($errors, "Review cannot be a number");
    }

    
    //if there are no errors, proceed with inserting
    if(count($errors) == 0){
    

     // Inserting the review into the database
     $query = "INSERT INTO reviews (user_id, anime_id, ReviewText, ReviewDate) 
     VALUES ('$userId', '$animeid', ' $review ', NOW())";

     //Executing the query
    $insertResult= mysqli_query($connection, $query);

    if ($insertResult) {
        // Redirect to login_view page upon successful registration
        $success_message = 'Anime review was added successfully';
        echo json_encode(array('success' => $success_message));
        //header("Location:../views");
        //exit();
    

    }


    
        
        
    } 


    
}





?>