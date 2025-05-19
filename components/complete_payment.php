<?php
session_start();
include "../db_connect/db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_SESSION['customer_id'];
    $cart_id = $_SESSION['cart_id'];
    $staff_id = $_SESSION['staff_id'];

    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        // 1. Insert into orders
        $order_query = "INSERT INTO orders (customer_id, staff_id, order_date) VALUES (?, ?, NOW())";
        $order_stmt = mysqli_prepare($conn, $order_query);
        mysqli_stmt_bind_param($order_stmt, "ii", $customer_id, $staff_id);
        mysqli_stmt_execute($order_stmt);
        $order_id = mysqli_insert_id($conn);
        mysqli_stmt_close($order_stmt);

        // 2. Insert into payments
        $payment_total = $_SESSION['payment_total'];
        $payment_paid = $_POST['payment_paid'];
        $payment_change = $_POST['payment_change'];

        $payment_query = "INSERT INTO payments (order_id, payment_total, payment_paid, payment_change, payment_date) 
                          VALUES (?, ?, ?, ?, NOW())";
        $payment_stmt = mysqli_prepare($conn, $payment_query);
        mysqli_stmt_bind_param($payment_stmt, "iddd", $order_id, $payment_total, $payment_paid, $payment_change);
        mysqli_stmt_execute($payment_stmt);
        mysqli_stmt_close($payment_stmt);

        // 3. Fetch cart_items
        $cart_items_query = "SELECT product_id, quantity, subtotal FROM cart_items WHERE cart_id = ?";
        $cart_items_stmt = mysqli_prepare($conn, $cart_items_query);
        mysqli_stmt_bind_param($cart_items_stmt, "i", $cart_id);
        mysqli_stmt_execute($cart_items_stmt);
        $cart_items_result = mysqli_stmt_get_result($cart_items_stmt);

        // Prepare order_items insert statement
        $order_items_query = "INSERT INTO order_items (order_id, product_id, quantity, subtotal) 
                              VALUES (?, ?, ?, ?)";
        $order_items_stmt = mysqli_prepare($conn, $order_items_query);

        // Prepare stock_out_line insert statement
        $stock_out_line_query = "INSERT INTO stock_out_line (order_item_id, inventory_id, stock_out_quantity, stock_out_date)
                                 VALUES (?, ?, ?, NOW())";
        $stock_out_line_stmt = mysqli_prepare($conn, $stock_out_line_query);

        // Prepare inventory update statement
        $inventory_update_query = "UPDATE inventory SET stock_quantity = stock_quantity - ? WHERE inventory_id = ?";
        $inventory_update_stmt = mysqli_prepare($conn, $inventory_update_query);

        while ($row = mysqli_fetch_assoc($cart_items_result)) {
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];
            $subtotal = $row['subtotal'];

            // Insert into order_items
            mysqli_stmt_bind_param($order_items_stmt, "iiid", $order_id, $product_id, $quantity, $subtotal);
            mysqli_stmt_execute($order_items_stmt);
            $order_item_id = mysqli_insert_id($conn);

            // Lookup inventory_id from product_id
            $inventory_lookup_query = "SELECT inventory_id FROM inventory WHERE product_id = ?";
            $inventory_lookup_stmt = mysqli_prepare($conn, $inventory_lookup_query);
            mysqli_stmt_bind_param($inventory_lookup_stmt, "i", $product_id);
            mysqli_stmt_execute($inventory_lookup_stmt);
            mysqli_stmt_bind_result($inventory_lookup_stmt, $inventory_id);
            mysqli_stmt_fetch($inventory_lookup_stmt);
            mysqli_stmt_close($inventory_lookup_stmt);

            // Insert into stock_out_line
            mysqli_stmt_bind_param($stock_out_line_stmt, "iii", $order_item_id, $inventory_id, $quantity);
            mysqli_stmt_execute($stock_out_line_stmt);

            // Update inventory quantity
            mysqli_stmt_bind_param($inventory_update_stmt, "ii", $quantity, $inventory_id);
            mysqli_stmt_execute($inventory_update_stmt);
        }

        // Close all remaining statements
        mysqli_stmt_close($order_items_stmt);
        mysqli_stmt_close($cart_items_stmt);
        mysqli_stmt_close($stock_out_line_stmt);
        mysqli_stmt_close($inventory_update_stmt);

        // Delete cart items
        $delete_cart_items_query = "DELETE FROM cart_items WHERE cart_id = ?";
        $delete_cart_items_stmt = mysqli_prepare($conn, $delete_cart_items_query);
        mysqli_stmt_bind_param($delete_cart_items_stmt, "i", $cart_id);
        mysqli_stmt_execute($delete_cart_items_stmt);
        mysqli_stmt_close($delete_cart_items_stmt);


        // 6. Commit transaction
        mysqli_commit($conn);

        // Create new session for notification (after destroy)
        session_start();
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Transaction COMPLETED successfully!'
        ];

    } catch (Exception $e) {
        // Rollback on error
        mysqli_rollback($conn);

        // Start new session to send error message
        session_start();
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Transaction FAILED! ' . $e->getMessage()
        ];
    }

    // Redirect back
    header('Location: ../admin/prodCHECKOUT.php');
    exit();
}
?>
