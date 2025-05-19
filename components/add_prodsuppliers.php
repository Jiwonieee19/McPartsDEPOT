<?php
// Start session for notifications
session_start();

// Include the database connection
include "../db_connect/db_connection.php";

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $supplier_fullname = $_POST['supplier_fullname'];
    $supplier_email = $_POST['supplier_email'];
    $supplier_contact = $_POST['supplier_contact'];

    // Begin transaction
    mysqli_begin_transaction($conn);

    try {
        // SQL to insert into suppliers table
        $query = "INSERT INTO suppliers (supplier_fullname, supplier_email, supplier_contact, created_at) 
                  VALUES (?, ?, ?, NOW())";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sss", $supplier_fullname, $supplier_email, $supplier_contact);

        // Execute the statement
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Failed to insert supplier.");
        }

        // Commit transaction
        mysqli_commit($conn);

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Supplier ADDED successfully!'
        ];
    } catch (Exception $e) {
        // Rollback if there's an error
        mysqli_rollback($conn);

        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error ADDING Supplier! ' . $e->getMessage()
        ];
    }

    // Clean up
    if (isset($stmt)) mysqli_stmt_close($stmt);

    // Redirect to confirmation page
    header('Location: ../admin/prodCONFIRM.php');
    exit();
}
?>
