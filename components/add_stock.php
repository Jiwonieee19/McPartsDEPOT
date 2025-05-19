<?php
session_start();
include "../db_connect/db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inventory_id = $_POST['inventory_id'];
    $product_id = $_POST['product_id'];
    $added_quantity = $_POST['added_quantity'];
    $supplier_id = $_SESSION['supplier_id'];

    try {
        mysqli_begin_transaction($conn);

        // Step 1: Insert into stock_in_line
        $insertStockInQuery = "INSERT INTO stock_in_line (inventory_id, supplier_id, stock_in_quantity, stock_in_date) VALUES (?, ?, ?, NOW())";
        $insertStmt = mysqli_prepare($conn, $insertStockInQuery);
        mysqli_stmt_bind_param($insertStmt, "iii", $inventory_id, $supplier_id, $added_quantity);
        if (!mysqli_stmt_execute($insertStmt)) {
            throw new Exception("Insert stock_in_line failed");
        }
        mysqli_stmt_close($insertStmt);

        // Step 2: Update inventory stock
        $updateInvQuery = "UPDATE inventory SET stock_quantity = stock_quantity + ?, updated_at = NOW() WHERE inventory_id = ?";
        $updateStmt = mysqli_prepare($conn, $updateInvQuery);
        mysqli_stmt_bind_param($updateStmt, "ii", $added_quantity, $inventory_id);
        if (!mysqli_stmt_execute($updateStmt)) {
            throw new Exception("Update inventory failed");
        }
        mysqli_stmt_close($updateStmt);

        mysqli_commit($conn);

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Stock added successfully!'
        ];
    } catch (Exception $e) {
        mysqli_rollback($conn);
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Transaction failed: ' . $e->getMessage()
        ];
    }

    header('Location: ../admin/prodVIEWSTOCK.php');
    exit();
}
?>
