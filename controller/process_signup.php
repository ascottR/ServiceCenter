<?php

include '../database/config.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $number = mysqli_real_escape_string($conn, $_POST["number"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);
    $currentDate = date("Y-m-d");


    if ($password !== $confirmPassword) {
        echo "<script>alert('Error: Passwords do not match.'); window.location.href='../views/sign-up.php';</script>";
        exit();
    }

    // Hash the password (for better security, use password_hash() function)
    $hashedPassword = md5($password);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO Customer (fname, lname, email, password, createdAt, contactNumber) 
                            VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssssss", $fname, $lname, $email, $hashedPassword, $currentDate, $number);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Signup Successful'); window.location.href='../views/index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
