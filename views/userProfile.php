<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Profile</title>
    <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="images/logo.png"/>
  <link rel="stylesheet" href="css/profilestyles.css">
</head>
<body>
  <div class="container">
  <a href="userDashboard.php" class="back-btn">Back</a>

    <?php
    include "../controller/fetch_profile.php"; 
    ?>
    
    <div class="bookings">
      <h2>Bookings</h2>
      <table class="bookings">
        <thead>
          <tr>
            <th>Booking ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Vehicle</th>
            <th>Location</th>
            <th>Type</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
              include "../controller/fetch_my_bookings.php"; 
          ?>
        </tbody>
      </table>
    </div>
  </div>

   <!-- Update Status Popup Form 
   <div id="updateForm" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Update Booking Status</h2>
      <form class="update-form">

      <input type="hidden" id="updateBookingId" name="bookingId">

        <label for="newDate">New Date:</label>
        <input type="date" id="updateDate" name="newDate" required>

        <label for="newTime">New Time:</label>
        <input type="time" id="updateTime" name="newTime" required>

        <button type="submit" id="submitUpdate" class="update-status-btn">Update</button>
      </form>
    </div>
  </div>
-->
<script src="../js/updateBooking.js"></script>
  <script src="js/profilejs.js"></script>
</body>
</html>
