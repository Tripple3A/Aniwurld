<?php
include '../settings/core.php';
include '../settings/connection.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming form fields are sanitized properly
    $username = $_POST['username'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    // Check if file upload is successful
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        // Temporary file path
        $tmpFilePath = $_FILES['profile_picture']['tmp_name'];
        
        // Read the file contents
        $picture = file_get_contents($tmpFilePath);
        
        if ($picture !== false) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            // Retrieve the id of the user currently logged in
            $userId = $_SESSION['user_id'];

            // Handle image upload
            $image = addslashes($picture); // Convert image to binary data

            // Check if the user already has a profile
            $checkQuery = "SELECT * FROM profile WHERE user_id='$userId'";
            $checkResult = $connection->query($checkQuery);

            if ($checkResult->num_rows > 0) {
                // User has already set a profile, update it
                $updateQuery = "UPDATE profile SET twitter='$twitter', facebook='$facebook', instagram='$instagram', photo='$image' WHERE user_id='$userId'";
                


                //Also update the username in the users table with the new username
                $updateQuery2 = "UPDATE users SET username='$username' WHERE user_id='$userId'";
                mysqli_query($connection,  $updateQuery2);
           

                
                if ($connection->query($updateQuery) === TRUE) {
                    // Success
                    echo json_encode(array("success" => true));
                } else {
                    // Error
                    echo json_encode(array("success" => false, "error" => "Error updating profile: " . $connection->error));
                }
            } else {
                // User does not have a profile, insert new profile
                $insertQuery = "INSERT INTO profile (user_id, twitter, facebook, instagram, photo) VALUES ('$userId', '$twitter', '$facebook', '$instagram', '$image')";

                //Also update the username in the users table with the new username
                $updateQuery2 = "UPDATE users SET username='$username' WHERE user_id='$userId'";
                mysqli_query($connection,  $updateQuery2);

                if ($connection->query($insertQuery) === TRUE) {
                    // Success
                    echo json_encode(array("success" => true));
                } else {
                    // Error
                    echo json_encode(array("success" => false, "error" => "Error inserting new profile: " . $connection->error));
                }
            }
        } else {
            // Error reading file contents
            echo json_encode(array("success" => false, "error" => "Error reading file contents."));
        }
    } else {
        // Error in file upload
        echo json_encode(array("success" => false, "error" => "Error uploading file."));
    }
}

// Close database connection
$connection->close();
?>