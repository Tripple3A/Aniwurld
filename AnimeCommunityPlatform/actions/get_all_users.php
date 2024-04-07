<?php
//including the connection file
include '../settings/connection.php';

function getAllUsers() {
    global $connection;

    // Your SELECT query to fetch all chores
    $query = "SELECT * FROM Assignment";

    // Execute the query
    $result = mysqli_query($connection, $query);

    // Check if the query execution was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Check if any records were returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch records and assign to a variable
        $AssignmentData = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $AssignmentData[] = $row;
        }

        // Close the result set
        mysqli_free_result($result);

        // Return the result variable
        return $AssignmentData;
    } else {
        // No records found
        return null;
    }
}


















?>






