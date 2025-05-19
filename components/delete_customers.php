<?php 
session_start();
include("../db_connect/db_connection.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $customer_id = $_POST['customer_id'];

    // Begin transaction
    mysqli_begin_transaction($conn);

    try {
        $query = "DELETE FROM customers WHERE customer_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt,"i", $customer_id);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Execute failed: " . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);

        // Commit transaction
        mysqli_commit($conn);

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Customer DELETED successfully!'
        ];

    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($conn);

        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error DELETING Customer: ' . $e->getMessage()
        ];
    }

    header('Location: ../admin/accCUSTOMERS.php');
    exit();
}
?>
