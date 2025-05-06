<?php
session_start();
// include('notification.php');
include '../db_connect/db_connection.php';

// Redirect to dashboard if already logged in
// if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
//     header("Location: ../admin/DASHBOARD.php");
//     exit();
// }

// ADMIN SIGN_IN
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin'])) {
    $ADuser = $_POST['username'];
    $ADpass = $_POST['password'];

    if($ADuser === "Unsagane" && $ADpass === "admin123") {
        // $_SESSION['username'] = $ADuser;
        // $_SESSION['lastname'] = $ADuser;  
        // $_SESSION['profile'] = $row['profile'];
        header("Location: ../admin/adminDASHBOARD.php");
        exit();
    }
}

// Handle the login process
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $_SESSION['password'] = $pass; // Store the entered password


    // Query to check the user
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify the password using password_hash
        if (password_verify($pass, $row['password'])) {
            // if ($pass ==  $row['password']) {

            $_SESSION['username'] = $user;
            $_SESSION['userid'] = $row['userid'];
            // $_SESSION['password'] = (password_verify($pass, $row['password']));
            // $_SESSION['password'] = $row['password'];
            // $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['middlename'] = $row['middlename'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['suffix'] = $row['suffix'];
            $_SESSION['age'] = $row['age'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['civil_status'] = $row['civil_status'];
            $_SESSION['birthdate'] = $row['birthdate'];
            $_SESSION['birthplace'] = $row['birthplace'];
            $_SESSION['nationality'] = $row['nationality'];
            $_SESSION['weight'] = $row['weight'];
            $_SESSION['height'] = $row['height'];
            $_SESSION['purok'] = $row['purok'];
            $_SESSION['mobile_number'] = $row['mobile_number'];
            $_SESSION['emer_number'] = $row['emer_number'];
            $_SESSION['emer_contname'] = $row['emer_contname'];
            $_SESSION['emer_relation'] = $row['emer_relation'];
            $_SESSION['usercreation'] = $row['usercreation'];
            $_SESSION['profile'] = $row['profile'];



            header("Location: ../admin/DASHBOARD.php"); // Redirect to the protected page
            exit();
        } else {
            // $_SESSION['notification'];
            // echo "<script>
            //     alert('Invalid Username or Password');
            //     window.location.href = '../landing.php';
            // </script>";
            // exit();
            echo "<script>alert('Invalid Username or Password');</script>";
            exit();
        }
    } else {
        echo "<script>alert('Account does not exist');</script>";
        // header("Location: ../landing.php"); // Redirect to the protected page
        exit();
    }
}

$conn->close();
?>
