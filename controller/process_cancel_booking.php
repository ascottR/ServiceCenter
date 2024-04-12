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

// Handle AJAX request for canceling booking
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $bookingIdToCancel = mysqli_real_escape_string($conn, $_POST["bookingId"]);

    $deleteBookingSql = "DELETE FROM bookings WHERE bookingId = ?";
    $deleteBookingStmt = $conn->prepare($deleteBookingSql);
    $deleteBookingStmt->bind_param("s", $bookingIdToCancel);

    if ($deleteBookingStmt->execute()) {
        // Cancellation successful
        $response['success'] = true;

        // Redirect to the user profile page
        header('Location: ../views/userProfile.php');
        exit(); // Ensure that no further output is sent after the redirect
    } else {
        // Cancellation failed
        $response['error'] = 'Error canceling booking: ' . $deleteBookingStmt->error;
    }

    // Close the statement
    $deleteBookingStmt->close();
}

// Close the database connection
$conn->close();

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
