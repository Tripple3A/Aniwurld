<?php

include ('../settings/connection.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}






//*Receiving all input value from the form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $errors = array();
    
    //receive all input values from the form
    

    $newCategory = mysqli_real_escape_string($connection, $_POST['add-text']);
    


    //would need to ensure user does not submit empty review
    if(empty($newCategory)){
        array_push($errors, "Cannot submit empty category");
    }



    //would need tp validate that the review is not a number
    if(is_numeric($newCategory)){
        array_push($errors, "Category cannot be a number");
    }

    
    //if there are no errors, proceed with inserting
    if(count($errors) == 0){
    

     //insert the new category into the categories table
     $query = "INSERT INTO categories (category) VALUES ('$newCategory')";
     $insertResult= mysqli_query($connection, $query);

     
    

     if ($insertResult) {
        
        // Encode the response array into JSON format and echo it
        echo json_encode(array('name' => $newCategory));
    } else {
        // If insertion failed, return error message
        echo json_encode(array('error' => 'Failed to add category'));
    }
} else {
    // If there are errors, return error messages
    echo json_encode(array('errors' => $errors));
}
}

    






?>