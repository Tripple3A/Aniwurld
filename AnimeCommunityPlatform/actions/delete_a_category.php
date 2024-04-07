<?php

include ('../settings/connection.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}






//*Receiving all input value from the form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    

    // Retrieve category name
    $category = $_POST['category'];


    //Retrieve the category id from categories table based on category id
    $query = "SELECT * FROM categories WHERE category = '$category'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $category_id = $row['category_id'];



    //Delete the category based on categoryid from the categories table and also in other tables that have the id as foreign key, cascade
    $query = "DELETE FROM categories WHERE category_id = '$category_id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        
        // Encode the response array into JSON format and echo it
        echo json_encode(array('success' => 'Successfully deleted category'));
    } else {
        // If insertion failed, return error message
        echo json_encode(array('error' => 'Failed to delete category'));
    }
}
else {
    // If there are errors, return error messages
    echo json_encode(array('errors' => 'No request sent'));
}



    






?>