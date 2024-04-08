<?php
//including the connection file
include '../settings/connection.php';

function getAllUsers() {
    global $connection;

    
    $query = "SELECT 
    u.username,
    p.photo,
    p.twitter,
    p.facebook,
    p.instagram,
    u.email
FROM 
    users u
JOIN 
    profile p ON u.user_id = p.user_id";


    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query failed: ' . mysqli_error($connection));
    }

    $Allusers= mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result set
    mysqli_free_result($result);

    // Close connection
    mysqli_close($connection);

    return $Allusers;
}

?>