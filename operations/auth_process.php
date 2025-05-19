<?php
session_start();
include '../db_connect/db_connection.php';

// ADMIN SIGN_IN (SuperAdmin hardcoded)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin'])) {
    $ADuser = $_POST['staff_username'];
    $ADpass = $_POST['staff_password'];


    if (strcmp($ADuser, "SuperA") === 0 && strcmp($ADpass, "admin123") === 0) {
        
            $_SESSION['staff_profile'] = "cool.jpg";
            $_SESSION['staff_username'] = "SuperA";
            $_SESSION['staff_password'] = "admin123";
            $_SESSION['ROLE'] = "ADMIN";
            // $_SESSION['staff_id'] = "00";

        header("Location: ../admin/DASHBOARD.php");
        exit();
    }

    // Store entered password
    $_SESSION['password'] = $ADpass;

    // Query to check the user
    $sql = "SELECT * FROM staffs WHERE staff_username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) { 
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $ADuser);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Compare plain-text passwords directly (NOT secure)
        if ($ADpass === $row['staff_password']) {
            $_SESSION['staff_username'] = $ADuser;
            $_SESSION['staff_id'] = $row['staff_id'];
            $_SESSION['staff_profile'] = $row['staff_profile'];
            $_SESSION['staff_password'] = $row['staff_password'];
            $_SESSION['ROLE'] = "STAFF";

            header("Location: ../admin/DASHBOARD.php");
            exit();
        } else {
            echo "<script>alert('Invalid Username or Password'); window.location.href='../landing.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Account does not exist'); window.location.href='../landing.php';</script>";
        exit();
    }
}

$conn->close();
?>
