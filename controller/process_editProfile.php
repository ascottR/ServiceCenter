<?php
// Include the database configuration
include '../database/config.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../views/login.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $contactNumber = mysqli_real_escape_string($conn, $_POST["contactNumber"]);

    // Update customer profile in the database
    $sql = "UPDATE customer SET fname = ?, lname = ?, contactNumber = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fname, $lname, $contactNumber, $email);

    if ($stmt->execute()) {
        // Profile update successful
        header("Location: ../views/userProfile.php");
        exit();
    } else {
        // Profile update failed
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
