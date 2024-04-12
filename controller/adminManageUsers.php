<?php
// Include the database configuration
include '../database/config.php';
// session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: ../views/adminLogin.php");
    exit();
}

// Fetch all customer details from the database
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Contact Number</th><th>Created At</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['contactNumber'] . "</td>";
        echo "<td>" . $row['createdAt'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No customers found.";
}

// Close the database connection
$conn->close();
