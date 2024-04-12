<?php
// Include the database configuration
include '../database/config.php';
// session_start();

// Initialize the response array
$response = array('success' => false, 'error' => '');

// Handle AJAX request for updating booking status
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $bookingIdToUpdate = mysqli_real_escape_string($conn, $_POST["bookingId"]);
    $newStatus = mysqli_real_escape_string($conn, $_POST["newStatus"]);

    // Update the booking status in the database
    $updateSql = "UPDATE bookings SET status = ? WHERE bookingId = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ss", $newStatus, $bookingIdToUpdate);

    if ($updateStmt->execute()) {
        // Update successful
        $response['success'] = true;
    } else {
        // Update failed
        $response['error'] = 'Error updating booking status: ' . $updateStmt->error;
    }

    // Close the statement
    $updateStmt->close();
}

// Close the database connection
$conn->close();

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
