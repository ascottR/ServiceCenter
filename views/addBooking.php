<?php
session_start();
$id = $_SESSION['id'];
?>

<html>
    <head>
              <!-- awesome fontfamily -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bookingFormPage.css">
    </head>
    <body>
    <a href="userDashboard.php" class="back-btn">Back</a>
    <form class="contact_form" action="../controller/process_booking.php" id="bookingForm" method="post">
   <label for="bookingdate">Booking Date:</label>
   <input type="date" id="bookingdate" name="bookingdate" required>

   <label for="bookingtime">Booking Time:</label>
   <input type="time" id="bookingtime" name="bookingtime" required>

   <label for="vehicle">Vehicle:</label>
   <input type="text" id="vehicle" name="vehicle" required >

   <label for="location">Location:</label>
   <input type="text" id="location" name="location" placeholder="22/4, kaduwela road , malabe" required >

   <select name="type" id="type" required>
       <option value="none">Select Option</option>
       <option value="dropOff">Drop Off</option>
       <option value="pickUp">Pick UP</option>
   </select>

   <input type="hidden" name="customerID" value="<?php echo $id; ?>">

   <button type="submit">Make Booking</button>
</form>

    </body>
</html>