<?php
include "../db_connect/db_connection.php";

$order_id = $_SESSION['order_id'];
$transactionDetailsQuery = "
SELECT 
    oi.order_item_id,
    oi.order_id,
    oi.product_id,
    p.product_name,
    p.product_category,
    oi.quantity,
    oi.subtotal
FROM order_items oi
JOIN orders o ON oi.order_id = o.order_id
JOIN products p ON oi.product_id = p.product_id
WHERE oi.order_id = ?;
";

// Prepare and execute transaction details query
$stmt2 = $conn->prepare($transactionDetailsQuery);
$stmt2->bind_param("i", $order_id);
$stmt2->execute();
$customerTransactionsDetailsResult = $stmt2->get_result();

?>