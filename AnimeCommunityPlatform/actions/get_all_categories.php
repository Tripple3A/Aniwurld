<?php
//including the connection file
include '../settings/connection.php';

function getAllCategories() {
    global $connection;

    // Your SELECT query to fetch all categories
    $query = "SELECT * FROM categories";

    // Execute the query
    $result = mysqli_query($connection, $query);

    // Check if the query execution was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Check if any records were returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch records and assign to a variable
        $categoriesData = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $categoriesData[] = $row;
        }

        // Close the result set
        mysqli_free_result($result);

        // Return the result variable
        return $categoriesData;
    } else {
        // No records found
        return null;
    }
}




?>