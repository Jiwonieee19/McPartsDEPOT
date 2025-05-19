<?php
    $customer_id = $_SESSION['customer_id'];
    $query = "SELECT cart_id FROM carts WHERE customer_id = '$customer_id'";
    $cartResult = mysqli_query($conn, $query);
?>