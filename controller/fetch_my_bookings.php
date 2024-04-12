<?php
// Include the database configuration
include '../database/config.php';
// session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: ../views/login.php");
    exit();
}

// Get the customer ID from the session
$customerID = $_SESSION['id'];

// Fetch bookings for the logged-in customer
$sql = "SELECT * FROM bookings WHERE customerID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $customerID);
$stmt->execute();

$result = $stmt->get_result();

// Display the bookings
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['bookingId'] . "</td>";
        echo "<td>" . $row['bookingdate'] . "</td>";
        echo "<td>" . $row['bookingtime'] . "</td>";
        echo "<td>" . $row['vehicle'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>" . $row['type'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>";
        //echo "<button class=\"update-button update-btn\" data-booking-id=\"" . $row['bookingId'] . "\">Update</button>";
        echo "<form action='../controller/process_cancel_booking.php' method='post'>
          <input type='hidden' name='bookingId' value='{$row['bookingId']}' class=\"cancel-button update-btn\" data-booking-id=\"" . $row['bookingId'] . "\">
          <input type='submit' value='Cancel'>
      </form>";

        //echo "<button class=\"cancel-button update-btn\" data-booking-id=\"" . $row['bookingId'] . "\">Cancel</button>";
        echo "</td>";
        echo "</tr>";
    }

} else {
    echo "You have no bookings.";
}

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();
