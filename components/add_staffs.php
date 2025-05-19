<?php
// Start session for notifications
session_start();

// Include the database connection
include "../db_connect/db_connection.php";

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $staff_username   = $_POST['staff_username'];
    $staff_firstname  = $_POST['staff_firstname'];
    $staff_lastname   = $_POST['staff_lastname'];
    $staff_birthdate  = $_POST['staff_birthdate'];
    $staff_password   = $_POST['staff_password'];
    $confirm_password = $_POST['confirm_password'];
    $staff_email      = $_POST['staff_email'];
    $staff_contact    = $_POST['staff_contact'];

    // Basic password match check
    if ($staff_password !== $confirm_password) {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Passwords do not match!'
        ];
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        $query = "INSERT INTO staffs 
            (staff_username, staff_firstname, staff_lastname, staff_birthdate, staff_password, staff_email, staff_contact, hired_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "sssssss",
            $staff_username, $staff_firstname, $staff_lastname,
            $staff_birthdate, $staff_password, $staff_email, $staff_contact
        );

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Execute failed: " . mysqli_stmt_error($stmt));
        }

        // Commit if everything went fine
        mysqli_commit($conn);

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Staff ADDED successfully!'
        ];
    } catch (Exception $e) {
        // Rollback on error
        mysqli_rollback($conn);

        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error ADDING Staff! ' . $e->getMessage()
        ];
    }

    // Clean up
    if (isset($stmt)) {
        mysqli_stmt_close($stmt);
    }

    // Redirect
    header('Location: ../admin/STAFFS.php');
    exit();
}
?>
