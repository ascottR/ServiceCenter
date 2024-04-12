<?php
// Include the database configuration
include '../database/config.php';
session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Retrieve user data from the database based on the provided email
    $sql = "SELECT * FROM customer WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, check password
        $row = $result->fetch_assoc();
        $hashedPassword = md5($password); // This assumes the password is stored as an MD5 hash; use password_hash in a real scenario

        if ($hashedPassword === $row["password"]) {

            $_SESSION['email'] = $row["email"];
            $_SESSION['id'] = $row["id"];
            echo "<script> window.location.href='../views/userDashboard.php';</script>";
            // You might want to set session variables and redirect the user to another page upon successful login
        } else {
            echo "<script>alert('Error: Invalid Password.'); window.location.href='../views/index.php';</script>";
        }
    } else {
        echo "<script>alert('Error: User not found'); window.location.href='../views/index.php';</script>.";
    }
}

// Close the database connection
$conn->close();
