<?php
include "../db_connect/db_connection.php";

$transactionQuery = "
SELECT 
    o.order_id,
    o.order_date,
    c.customer_fullname,
    s.staff_firstname,
    s.staff_lastname,
    p.payment_total,
    p.payment_paid,
    p.payment_change
FROM orders o
JOIN customers c ON o.customer_id = c.customer_id
JOIN staffs s ON o.staff_id = s.staff_id
JOIN payments p ON o.order_id = p.order_id
ORDER BY o.order_date DESC;
";

$customerTransactionsResult = mysqli_query($conn, $transactionQuery);

$supplierTransactionsQuery = "SELECT 
    si.*,
    p.product_name,
    s.supplier_fullname,
    i.stock_quantity
FROM stock_in_line si
JOIN inventory i ON si.inventory_id = i.inventory_id
JOIN suppliers s ON si.supplier_id = s.supplier_id
JOIN products p ON i.product_id = p.product_id
ORDER BY si.stock_in_date DESC;
";

$supplierTransactionsResult = mysqli_query($conn, $supplierTransactionsQuery);
?>