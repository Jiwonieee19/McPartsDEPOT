<?php
// Start session for notifications
session_start();

// Include the database connection
include "../db_connect/db_connection.php";

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_description = $_POST['product_description'];
    $stock_quantity = $_POST['stock_quantity'];

    // Handle image upload
    $uploadDir = "../admin/assets/images/$product_category/";
    $imageName = basename($_FILES['profile']['name']);
    $uploadFile = $uploadDir . $imageName;

    if (!move_uploaded_file($_FILES['profile']['tmp_name'], $uploadFile)) {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Failed to upload product image!'
        ];
        header('Location: ../admin/PRODUCTS1.php');
        exit();
    }

    $product_image = $imageName; // Save filename only

    // Start the transaction
    mysqli_begin_transaction($conn);

    try {
        // SQL query to insert into products table
        $query = "INSERT INTO products (product_image, product_name, product_price, product_category, product_description) 
                  VALUES (?, ?, ?, ?, ?)";

        // Prepare and bind
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssdss", 
                               $product_image, $product_name, $product_price, $product_category, $product_description);
        mysqli_stmt_execute($stmt);

        // Get inserted product ID
        $product_id = mysqli_insert_id($conn);

        // Insert into inventory table
        $cart_query = "INSERT INTO inventory (product_id, stock_quantity, created_at, updated_at) 
                       VALUES (?, ?, NOW(), NOW())";
        $cart_stmt = mysqli_prepare($conn, $cart_query);
        mysqli_stmt_bind_param($cart_stmt, "ii", $product_id, $stock_quantity);
        mysqli_stmt_execute($cart_stmt);

        // Commit transaction
        mysqli_commit($conn);

        // Close statements
        mysqli_stmt_close($stmt);
        mysqli_stmt_close($cart_stmt);

        // Success notification
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Product ADDED successfully!'
        ];
    } catch (Exception $e) {
        // Rollback transaction if any error occurs
        mysqli_rollback($conn);

        // Log the error (optional)
        error_log("Transaction failed: " . $e->getMessage());

        // Error notification
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error ADDING Product!'
        ];
    }

    // Redirect back
    header('Location: ../admin/realPRODUCTS.php');
    exit();
}
?>
