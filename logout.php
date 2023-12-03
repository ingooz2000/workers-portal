<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other desired page after logout
    header("location: login.html");
    exit();
} else {
    // If the user is not logged in, redirect to the login page
    header("location: login.html");
    exit();
}
?>
