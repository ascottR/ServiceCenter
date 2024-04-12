<?php
// Include the database configuration
include '../database/config.php';
// session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: ../views/adminLogin.php");
    exit();
}

// Fetch all booking details from the database
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Booking ID</th><th>Customer ID</th><th>Date</th><th>Time</th><th>Vehicle</th><th>Location</th><th>Status</th><th>Action</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['bookingId'] . "</td>";
        echo "<td>" . $row['customerID'] . "</td>";
        echo "<td>" . $row['bookingdate'] . "</td>";
        echo "<td>" . $row['bookingtime'] . "</td>";
        echo "<td>" . $row['vehicle'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td class='status' data-booking-id='" . $row['bookingId'] . "'>" . $row['status'] . "</td>";
        echo "<td>";
        echo "<button class='update-status-button' data-booking-id='" . $row['bookingId'] . "'>Update Status</button>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Modal form for updating status
    echo "<div id='update-status-modal' class='modal' style='display:none;'>";
    echo "<form class='update-status-form'>";
    echo "<h3>Update Status</h3>";
    echo "<select class='status-dropdown' id='modal-status-dropdown'>";
    echo "<option value='pending'>Pending</option>";
    echo "<option value='vehicle_received'>Vehicle Received</option>";
    echo "<option value='on_service'>On Service</option>";
    echo "<option value='service_complete'>Service Complete</option>";
    echo "<option value='booking_completed'>Booking Completed</option>";
    echo "</select>";
    echo "<div>";

    echo "<button type='button' class='submit-update-button' id='modal-submit-button'>Submit</button>";
    echo "<button type='button' class='close-modal-button' onclick='closeModal()'>Close</button>";
    echo "</div>";
    echo "</select>";

    echo "</form>";
    echo "</div>";
} else {
    echo "No bookings found.";
}

// Close the database connection
$conn->close();
