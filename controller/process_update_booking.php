<?php
// Include the database configuration
include '../database/config.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Content-Type: application/json");
    echo json_encode(array('success' => false, 'error' => 'User not logged in.'));
    exit();
}

// Initialize the response array
$response = array('success' => false, 'error' => '');

// Handle AJAX form submission for updating date and time
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $bookingIdToUpdate = mysqli_real_escape_string($conn, $_POST["bookingId"]);
    $newDate = mysqli_real_escape_string($conn, $_POST["newDate"]);
    $newTime = mysqli_real_escape_string($conn, $_POST["newTime"]);

    // Update the booking with new date and time
    $updateSql = "UPDATE bookings SET bookingdate = ?, bookingtime = ? WHERE bookingId = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("sss", $newDate, $newTime, $bookingIdToUpdate);

    if ($updateStmt->execute()) {
        // Update successful
        $response['success'] = true;
    } else {
        // Update failed
        $response['error'] = 'Error updating date and time: ' . $updateStmt->error;
    }

    // Close the statement
    $updateStmt->close();
}

// Close the database connection
$conn->close();

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
