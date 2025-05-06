<?php
// Start session for notifications
session_start();

// update_users.php

// Include the database connection
include "../db_connect/db_connection.php";



// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $userid = $_POST['userid'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $civil_status = $_POST['civil_status'];
    $birthdate = $_POST['birthdate'];
    $birthplace = $_POST['birthplace'];
    $age = $_POST['age']; // Numeric
    $weight = $_POST['weight']; // Numeric
    $height = $_POST['height']; // Numeric
    $purok = $_POST['purok'];
    $mobile_number = $_POST['mobile_number']; // Numeric
    $email = $_POST['email'];
    $emer_number = $_POST['emer_number']; // Numeric
    $emer_contname = $_POST['emer_contname'];
    $emer_relation = $_POST['emer_relation'];

    // SQL query to update the resident record
    $query = "UPDATE users SET firstname = ?, middlename = ?, lastname = ?, suffix = ?,
             gender = ?, civil_status = ?, birthdate = ?, birthplace = ?, age = ?, weight = ?, height = ?, purok = ?, mobile_number = ?, email = ?, 
             emer_number = ?, emer_contname = ?, emer_relation = ? WHERE userid = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $query);

    // Bind the parameters
    // s = string, i = integer, d = double, b = blob (binary data)
    // For the numeric fields, we will use 'i' (integer)
    mysqli_stmt_bind_param($stmt, "ssssssssiddsisissi", 
                           $firstname, $middlename, $lastname, 
                           $suffix, $gender, $civil_status, $birthdate, $birthplace, 
                           $age, $weight, $height, $purok, $mobile_number, $email, $emer_number, 
                           $emer_contname, $emer_relation, $userid);

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        // Set success message in session
        $_SESSION['notification'] = [
            'type' => 'success', // 'success' for success message
            'message' => 'your RESIDENCY UPDATED successfully!' // Success message
        ];
    } else {
        // Set error message in session
        $_SESSION['notification'] = [
            'type' => 'danger', // 'danger' for error message
            'message' => 'Error UPDATING your RESIDENCY ' // Error message with specific MySQL error
        ];
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Redirect back to the dashboard or the residents list page
    header('Location: ../admin/uRESIDENCY.php');
    exit();
}
?>
