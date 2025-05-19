<?php
    include "../db_connect/db_connection.php";

    $query = "SELECT p.*, i.inventory_id, i.stock_quantity, i.updated_at FROM products p LEFT JOIN inventory i ON p.product_id = i.product_id";
    $allProductsResult = mysqli_query($conn, $query);

    $query = "SELECT p.*, i.stock_quantity FROM products p LEFT JOIN inventory i ON p.product_id = i.product_id WHERE p.product_category = 'Engine Components'";
    $pEngineResult = mysqli_query($conn, $query);

    $query = "SELECT p.*, i.stock_quantity FROM products p LEFT JOIN inventory i ON p.product_id = i.product_id WHERE p.product_category = 'Ignition System'";
    $pIgnitionResult = mysqli_query($conn, $query);

    $query = "SELECT p.*, i.stock_quantity FROM products p LEFT JOIN inventory i ON p.product_id = i.product_id WHERE p.product_category = 'Fuel System'";
    $pFuelResult = mysqli_query($conn, $query);

    $query = "SELECT p.*, i.stock_quantity FROM products p LEFT JOIN inventory i ON p.product_id = i.product_id WHERE p.product_category = 'Brake System'";
    $pBrakeResult = mysqli_query($conn, $query);

    $query = "SELECT p.*, i.stock_quantity FROM products p LEFT JOIN inventory i ON p.product_id = i.product_id WHERE p.product_category = 'Exhaust and Filter'";
    $pExhaustResult = mysqli_query($conn, $query);

    $query = "SELECT p.*, i.stock_quantity FROM products p LEFT JOIN inventory i ON p.product_id = i.product_id WHERE p.product_category = 'Others'";
    $pOtherResult = mysqli_query($conn, $query);
?>