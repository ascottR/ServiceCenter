<?php
// Include the database configuration
include '../database/config.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: ../views/login.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $customerID = $_POST["customerID"];
    $bookingdate = mysqli_real_escape_string($conn, $_POST["bookingdate"]);
    $bookingtime = mysqli_real_escape_string($conn, $_POST["bookingtime"]);
    $vehicle = mysqli_real_escape_string($conn, $_POST["vehicle"]);
    $location = mysqli_real_escape_string($conn, $_POST["location"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $status = "pending"; // You can set the default status as needed

    // Insert the booking into the database
    $sql = "INSERT INTO Bookings (customerID, bookingdate, bookingtime, vehicle, location, status, type) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Adjusted bind_param method to match the number of placeholders
    $stmt->bind_param("sssssss", $customerID, $bookingdate, $bookingtime, $vehicle, $location, $status, $type);

    if ($stmt->execute()) {
        // Booking successful
        echo "<script>alert('Booking Made Successfully'); window.location.href = '../views/userDashboard.php';</script>";

        //header("Location: ../views/dashboard.php"); // Redirect to dashboard or another page
        exit();
    } else {
        // Booking failed
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
