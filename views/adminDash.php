


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Detailing Hub Admin Panel</title>
  <link rel="stylesheet" href="css/adminstyles.css">
  <style>
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
} 

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

.modal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    max-width: 250px; 
    width: 100%;
    text-align: center;
}

/* Styles for the form inside the modal */
.update-status-form {
    display: flex;
    flex-direction: column;
}

/* Styles for the select dropdown */
.status-dropdown {
    margin-bottom: 20px;
    padding: 12px;
    font-size: 16px;
    border-radius: 5px;
}

/* Styles for the buttons - inline and same color */
.submit-update-button,
.close-modal-button {
    padding: 12px;
    margin: 0 5px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    background-color: #3498db;
    color: white;
}

.submit-update-button:hover{
    background-color: #2980b9;
}

.close-modal-button {
    background-color: #f44336;
    color: white;
}

.close-modal-button:hover {
    background-color: #d32f2f;
}

/* Styles for the Update Status button */
.update-status-button {
    padding: 10px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.update-status-button:hover {
    background-color: #2980b9;
}

</style>
</head>
<body>
  <div class="admin-panel">
    <div class="sidebar">
      <h2>The Detailing Hub</h2>
      <nav>
        <ul>
          <li><a href="#" onclick="showDashboard()">Dashboard</a></li>
          <li><a href="#" onclick="showCustomers()">Customers</a></li>
          <li><a href="#" onclick="showBookings()">Bookings</a></li>
          <li><a href="../controller/adminLogoutControl.php" >Logout</a></li>

        </ul>
      </nav>
    </div>

    <div class="main-content">
      <!-- Content for Dashboard -->
      <div id="dashboard" class="content active">
        <h1>Dashboard</h1>
        <div class="dashboard-boxes">
          <div class="dashboard-box">
            <h2>Number of Customers</h2>
            <p id="customerCount"><?php include "../controller/adminTotalCustomes.php";?></p>
          </div>
          <div class="dashboard-box">
            <h2>Number of Bookings</h2>
            <p id="bookingCount"><?php include "../controller/adminBookingCount.php";?></p>
          </div>
        </div>
        <!-- Dashboard content goes here -->
      </div>

      <!-- Content for Customers -->
      <div id="customers" class="content">
        <h1>Customers</h1>
        <?php
            include "../controller/adminManageUsers.php";
        ?>
      </div>

      <!-- Content for Bookings -->
      <div id="bookings" class="content">
        <h1>Bookings</h1>
        <!-- Bookings content goes here -->
        <?php
            include "../controller/adminManageBookings.php";
         ?>
      </div>
    </div>
    <script>
        // scripts.js

// Function to show the dashboard content
function showDashboard() {
    hideAllContent(); // Hide all content first
    document.getElementById('dashboard').classList.add('active'); // Show the dashboard content
}

// Function to show the customers content
function showCustomers() {
    hideAllContent(); // Hide all content first
    document.getElementById('customers').classList.add('active'); // Show the customers content
}

// Function to show the bookings content
function showBookings() {
    hideAllContent(); // Hide all content first
    document.getElementById('bookings').classList.add('active'); // Show the bookings content
}

// Function to hide all content
function hideAllContent() {
    var contents = document.querySelectorAll('.content');
    contents.forEach(function(content) {
        content.classList.remove('active'); // Remove the 'active' class from all content
    });
}

    </script>

<script src="../js/update_booking_status.js"></script>
<script src="../js/closebutton.js"></script>

  </div>
</body>
</html>
