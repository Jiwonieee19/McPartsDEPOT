<?php
// Start session for notifications
session_start();

// Include the database connection
include "../db_connect/db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_id = $_POST['staff_id'];
    $staff_firstname = $_POST['staff_firstname'];
    $staff_lastname = $_POST['staff_lastname'];
    $staff_birthdate = $_POST['staff_birthdate'];
    $staff_profile = $_POST['staff_profile'];
    $staff_email = $_POST['staff_email'];
    $staff_contact = $_POST['staff_contact'];

    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        $query = "UPDATE staffs SET staff_firstname = ?, staff_lastname = ?, staff_birthdate = ?, staff_profile = ?, staff_email = ?, staff_contact = ? WHERE staff_id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            throw new Exception('Failed to prepare statement');
        }

        mysqli_stmt_bind_param($stmt, "ssssssi", $staff_firstname, $staff_lastname, $staff_birthdate, $staff_profile, $staff_email, $staff_contact, $staff_id);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception('Error UPDATING Staff!!');
        }

        mysqli_commit($conn);

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Staff UPDATED successfully!'
        ];

        mysqli_stmt_close($stmt);

    } catch (Exception $e) {
        mysqli_rollback($conn);

        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => $e->getMessage()
        ];
    }

    header('Location: ../admin/STAFFS.php');
    exit();
}
?>
