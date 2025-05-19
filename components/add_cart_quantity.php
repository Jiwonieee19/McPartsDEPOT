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
        header('Location: ../admin/prodVIEWCART.php');
        exit();
    }

    // Begin SQL transaction
    mysqli_begin_transaction($conn);

    try {
        // SQL query to update the cart item
        $query = "UPDATE cart_items 
                  SET quantity = ?, subtotal = ?
                  WHERE cart_id = ? AND product_id = ?";

        // Prepare the statement
        $stmt = mysqli_prepare($conn, $query);

        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "idii", 
                               $quantity, $subtotal, $cart_id, $product_id);

        // Execute the statement
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Failed to update cart item.");
        }

        // Commit the transaction
        mysqli_commit($conn);

        // Set success message
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Quantity UPDATED successfully!'
        ];
    } catch (Exception $e) {
        // Rollback the transaction
        mysqli_rollback($conn);

        // Set error message
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error UPDATING Quantity: ' . $e->getMessage()
        ];
    }

    // Close statement if set
    if (isset($stmt)) {
        mysqli_stmt_close($stmt);
    }

    // Redirect back to cart view
    header('Location: ../admin/prodVIEWCART.php');
    exit();
}
?>
