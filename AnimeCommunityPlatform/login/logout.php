<?php

// Starting a session
session_start();



// Unset the sessions created during login
unset($_SESSION['user_id']);


// Destroy the session
session_destroy();

// Redirect to the login_view page

header("Location: ../login/login.php");
exit; // Ensure that no further code is executed after the redirect
?>


