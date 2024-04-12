<?php

include_once "../Database/config.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputEmail = $_POST["email"];
    $inputPassword = $_POST["password"];

    $stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $inputEmail);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $resultSet = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultSet)) {
            $hashedPassword = $row["password"];

            if ($inputPassword == $hashedPassword) {
                $_SESSION["id"] = $row["id"];              
                $_SESSION["email"] = $row["email"];
            
                header("Location: ../views/adminDash.php");
                exit();
            } else {

                echo "<script>alert(\"Incorrect password\"); window.location.href='../views/adminLogin.php';</script>";

                exit();
            }
        } else {
            echo "<script> alert(\"User not found\"); window.location.href='../views/adminLogin.php';</script>";

            exit();
        }
    } else {
        echo "Error in query execution";
    }
}
