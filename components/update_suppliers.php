<?php
// Start session for notifications
session_start();

// Include the database connection
include "../db_connect/db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $supplier_id = $_POST['supplier_id'];
    $supplier_fullname = $_POST['supplier_fullname'];
    $supplier_email = $_POST['supplier_email'];
    $supplier_contact = $_POST['supplier_contact'];

    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        $query = "UPDATE suppliers SET supplier_fullname = ?, supplier_email = ?, supplier_contact = ? WHERE supplier_id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            throw new Exception('Failed to prepare statement');
        }

        mysqli_stmt_bind_param($stmt, "sssi", $supplier_fullname, $supplier_email, $supplier_contact, $supplier_id);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception('Error UPDATING Supplier!!');
        }

        mysqli_commit($conn);

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Supplier UPDATED successfully!'
        ];

        mysqli_stmt_close($stmt);

    } catch (Exception $e) {
        mysqli_rollback($conn);

        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => $e->getMessage()
        ];
    }

    header('Location: ../admin/accSUPPLIERS.php');
    exit();
}
?>
