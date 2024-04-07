<?php

include ('../settings/connection.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}






//*Receiving all input value from the form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    

    // Retrieve category name
    $category = $_POST['category'];


    
    
    

    
}
    






?>