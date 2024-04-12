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
        $error_message = 'Cannot submit empty category';
        echo json_encode(array('error' => $error_message));
        exit();
    }elseif (!preg_match("/^[a-zA-Z\s]+$/", $newCategory)) {
        $error_message = 'Category cannot be numeric';
        echo json_encode(array('error' => $error_message));
        exit();
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
} 
}

    






?>