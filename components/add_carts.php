<?php
// Start session for notifications
session_start();

// Include the database connection
include "../db_connect/db_connection.php";

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $cart_id = $_SESSION['cart_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $product_price = $_POST['product_price'];
    $stock_quantity = $_POST['stock_quantity'];

    $subtotal = $product_price * $quantity;

    // Check if the quantity exceeds current stock
    if ($quantity > $stock_quantity) {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Quantity exceeds available stock!'
        ];
        header('Location: ../admin/PRODUCTS1.php');
        exit();
    }

    // Begin transaction
    mysqli_begin_transaction($conn);

    try {
        // SQL query with UPSERT logic
        $query = "INSERT INTO cart_items (cart_id, product_id, quantity, subtotal) 
                  VALUES (?, ?, ?, ?)
                  ON DUPLICATE KEY UPDATE 
                      quantity = quantity + VALUES(quantity), 
                      subtotal = subtotal + VALUES(subtotal)";

        // Prepare the statement
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "iiid", $cart_id, $product_id, $quantity, $subtotal);

        // Execute and check
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Failed to add/update product in cart.");
        }

        // Commit transaction
        mysqli_commit($conn);

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Product ADDED successfully!'
        ];
    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($conn);
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error ADDING Product: ' . $e->getMessage()
        ];
    }

    // Clean up
    if (isset($stmt)) {
        mysqli_stmt_close($stmt);
    }

    // Redirect
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
