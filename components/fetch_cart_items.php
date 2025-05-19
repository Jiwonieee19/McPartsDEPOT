<?php
    include "../db_connect/db_connection.php";

    $cart_id = $_SESSION['cart_id'];
    $stmt = $conn->prepare("
    SELECT ci.quantity, ci.subtotal, p.*, i.stock_quantity
    FROM cart_items ci
    INNER JOIN products p ON ci.product_id = p.product_id
    LEFT JOIN inventory i ON p.product_id = i.product_id
    WHERE ci.cart_id = ?
    ");
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    $cartItemsResult = $stmt->get_result();

    $cart_id = $_SESSION['cart_id'];
    $stmt = $conn->prepare("
    SELECT ci.quantity, ci.subtotal, p.*, i.stock_quantity
    FROM cart_items ci
    INNER JOIN products p ON ci.product_id = p.product_id
    LEFT JOIN inventory i ON p.product_id = i.product_id
    WHERE ci.cart_id = ?
    ");
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    $calculateAmountResult = $stmt->get_result();
?>