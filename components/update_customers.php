<?php
// Start session for notifications
session_start();

// Include the database connection
include "../db_connect/db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_POST['customer_id'];
    $customer_fullname = $_POST['customer_fullname'];
    $customer_email = $_POST['customer_email'];
    $customer_contact = $_POST['customer_contact'];

    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        // SQL query to update the customer record
        $query = "UPDATE customers SET customer_fullname = ?, customer_email = ?, customer_contact = ? WHERE customer_id = ?";

        // Prepare the statement
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            throw new Exception('Failed to prepare statement');
        }

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssi", $customer_fullname, $customer_email, $customer_contact, $customer_id);

        // Execute the query
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception('Error UPDATING Customer!!');
        }

        // Commit transaction
        mysqli_commit($conn);

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Customer UPDATED successfully!'
        ];

        mysqli_stmt_close($stmt);

    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($conn);

        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => $e->getMessage()
        ];
    }

    // Redirect back to the customers page
    header('Location: ../admin/accCUSTOMERS.php');
    exit();
}
?>
