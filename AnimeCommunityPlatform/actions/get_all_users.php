<?php
//including the connection file
include '../settings/connection.php';

function getAllUsers() {
    global $connection;

    //getting the users with highest number of anime in the user_anime
    // table that fall under the category of already_watched in the 
    //categories table

    $query = "SELECT p.photo AS profile_image, u.username, COUNT(ua.anime_id) AS num_anime_watched
    FROM users u
    JOIN user_animes ua ON u.user_id = ua.user_id
    JOIN categories c ON ua.category_id = c.category_id
    JOIN profile p ON u.user_id = p.user_id
    WHERE c.category = 'Already watched'
    GROUP BY u.user_id, u.username, p.photo
    ORDER BY num_anime_watched DESC
    LIMIT 5";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query failed: ' . mysqli_error($connection));
    }

    $topWatchers = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result set
    mysqli_free_result($result);

    // Close connection
    mysqli_close($connection);

    return $topWatchers;
}

?>