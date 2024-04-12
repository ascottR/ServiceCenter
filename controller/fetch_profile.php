<?php
// Include the database configuration
include '../database/config.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../views/userDashboard.php");
    exit();
}

// Fetch customer details based on the logged-in user's email
$email = $_SESSION['email'];
$sql = "SELECT * FROM customer WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $customerData = $result->fetch_assoc();
    
    echo '<div class="profile">
      <h2>Customer Profile</h2>
      <div class="user-details">
        <div class="avatar">
          <img src="images/user.png" alt="Avatar">
        </div>
        <div class="user-info">
          <form action="../controller/process_editProfile.php" method="post" id="editProfileForm" ">
            <div>
              <label for="fname">First Name:</label>
              <input type="text" name="fname" id="fname" value="'. $customerData['fname'] .'">
            </div>
            <div>
              <label for="lname">Last Name:</label>
              <input type="text" name="lname" id="lname" value="'. $customerData['lname'] .'">
            </div>
            <div>
              <label for="telephone">Telephone:</label>
              <input type="tel" name="contactNumber" id="contactNumber" value="' . $customerData['contactNumber'] .'">
            </div>
            <div>
              <label for="email">Email:  '. $customerData['email'] .'</label>
              <input type="hidden" name="email" id="email" value ="'. $customerData['email'] .'">
            </div><br>
            <input type="submit" class = "save-btn" value="Save">
            </form>
        </div>
      </div>
    </div>';

    // Add other customer details as needed
} else {
    echo "Error: Customer not found.";
}

// Close the database connection
$conn->close();
