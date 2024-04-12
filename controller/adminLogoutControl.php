<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION["id"])) {
    // Destroy the session
    session_destroy();
    
    // Redirect to the login page or any other desired page
    header("location: ../views/adminLogin.php");
    exit();
} else {
    // If the user is not logged in, redirect to the login page
    header("location: ../views/adminLogin.php");
    exit();
}
?>