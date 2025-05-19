<?php
// Start session for notifications
session_start();

// Include the database connection
include "../db_connect/db_connection.php";

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $customer_fullname = $_POST['customer_fullname'];
    $customer_email = $_POST['customer_email'];
    $customer_contact = $_POST['customer_contact'];

    // Begin transaction
    mysqli_begin_transaction($conn);

    try {
        // Insert into customers table
        $query = "INSERT INTO customers (customer_fullname, customer_email, customer_contact, created_at) 
                  VALUES (?, ?, ?, NOW())";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sss", $customer_fullname, $customer_email, $customer_contact);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Failed to insert customer.");
        }

        // Get the newly inserted customer ID
        $customer_id = mysqli_insert_id($conn);

        // Optional: Save to session if needed later
        $_SESSION['customer_id'] = $customer_id;

        // Insert into carts table
        $cart_query = "INSERT INTO carts (customer_id, created_at, updated_at) 
                       VALUES (?, NOW(), NOW())";
        $cart_stmt = mysqli_prepare($conn, $cart_query);
        mysqli_stmt_bind_param($cart_stmt, "i", $customer_id);

        if (!mysqli_stmt_execute($cart_stmt)) {
            throw new Exception("Failed to create cart.");
        }

        // Commit if all steps succeed
        mysqli_commit($conn);

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Customer and cart created successfully!'
        ];

    } catch (Exception $e) {
        // Rollback if any step fails
        mysqli_rollback($conn);

        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Checkout failed! ' . $e->getMessage()
        ];
    }

    // Close statements if initialized
    if (isset($stmt)) mysqli_stmt_close($stmt);
    if (isset($cart_stmt)) mysqli_stmt_close($cart_stmt);

    // Redirect to checkout page
    header('Location: ../admin/prodCHECKOUT.php');
    exit();
}
?>
