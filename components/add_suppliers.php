<?php
// Start session for notifications
session_start();

// Include the database connection
include "../db_connect/db_connection.php";

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and get form data
    $supplier_fullname = trim($_POST['supplier_fullname']);
    $supplier_email    = trim($_POST['supplier_email']);
    $supplier_contact  = trim($_POST['supplier_contact']);

    // Validate required fields
    if (empty($supplier_fullname) || empty($supplier_email) || empty($supplier_contact)) {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Please fill in all required fields.'
        ];
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        // Check if supplier with same email already exists
        $check_query = "SELECT supplier_id FROM suppliers WHERE supplier_email = ?";
        $check_stmt = mysqli_prepare($conn, $check_query);
        if (!$check_stmt) {
            throw new Exception("Prepare failed: " . mysqli_error($conn));
        }
        mysqli_stmt_bind_param($check_stmt, "s", $supplier_email);
        mysqli_stmt_execute($check_stmt);
        mysqli_stmt_store_result($check_stmt);

        if (mysqli_stmt_num_rows($check_stmt) > 0) {
            mysqli_stmt_close($check_stmt);
            throw new Exception("A supplier with this email already exists.");
        }
        mysqli_stmt_close($check_stmt);

        // Insert new supplier
        $query = "INSERT INTO suppliers (supplier_fullname, supplier_email, supplier_contact, created_at) 
                  VALUES (?, ?, ?, NOW())";

        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt, "sss", 
            $supplier_fullname, $supplier_email, $supplier_contact
        );

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Execute failed: " . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);

        // Commit transaction
        mysqli_commit($conn);

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Supplier ADDED successfully!'
        ];
    } catch (Exception $e) {
        // Rollback on error
        mysqli_rollback($conn);

        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error ADDING Supplier: ' . $e->getMessage()
        ];
    }

    // Redirect back
    header('Location: ../admin/accSUPPLIERS.php');
    exit();
}
?>
