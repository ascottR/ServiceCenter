<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Signup</title>
  <link rel="stylesheet" href="css/signupstyles.css">
</head>
<body>
  <a href = "index.php"><button class="back-btn">Back</button></a>
  <div class="container">
    <div class="signup-form">
      <h2>Sign Up</h2>
        <form id="signupForm" action="../controller/process_signup.php" method="post">
          <div class="form-group">
            <label for="fname">First Name:</label>
            <input name="fname" type="text" id="fname" placeholder="Enter your username" required>
          </div>
          <div class="form-group">
            <label for="lname">Last Name:</label>
            <input name="lname" type="text" id="lname" placeholder="Enter your username" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input name="email" type="email" id="email" placeholder="Enter your email" required>
          </div>
          <div class="form-group">
            <label for="number">Telephone:</label>
            <input name="number" type="text" id="number" placeholder="Enter your contact number" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input name="password" type="password" id="password" placeholder="Enter your password" required>
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input name="confirmPassword" type="password" id="confirmPassword" placeholder="Confirm your password" required>
          </div>
          <button type="submit" class="signup-btn">Sign Up</button>
        </form>
    </div>
  </div>
</body>
</html>
