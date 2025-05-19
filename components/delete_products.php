<?php 
session_start();
include("../db_connect/db_connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $product_id = $_POST['product_id'];

    // Start the transaction
    mysqli_begin_transaction($conn);

    try {
        // Prepare delete query
        $query = "DELETE FROM products WHERE product_id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            throw new Exception("Statement preparation failed: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $product_id);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Execution failed: " . mysqli_stmt_error($stmt));
        }

        // Commit the transaction
        mysqli_commit($conn);

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Product DELETED successfully!'
        ];
    } catch (Exception $e) {
        // Rollback the transaction if an error occurred
        mysqli_rollback($conn);

        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error DELETING Product: ' . $e->getMessage()
        ];
    }

    // Clean up
    if (isset($stmt)) {
        mysqli_stmt_close($stmt);
    }

    header('Location: ../admin/realPRODUCTS.php');
    exit();
}
?>
