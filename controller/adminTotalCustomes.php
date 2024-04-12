<?php
// Include the database configuration
include '../database/config.php';
session_start();

// Check if the user is logged in
 if (!isset($_SESSION['id'])) {
     header("Location: ../views/adminLogin.php");
     exit();
 }

// Fetch the number of customers from the database
$sql = "SELECT COUNT(*) AS customerCount FROM customer";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $customerCount = $row['customerCount'];

    echo $customerCount;
} else {
    echo "Error fetching customer count: " . $conn->error;
}

// Close the database connection
$conn->close();
