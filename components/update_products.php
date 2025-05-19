<?php
session_start();
include "../db_connect/db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_description = $_POST['product_description'];
    
    $product_image = $_POST['current_image']; // fallback

    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../admin/assets/images/$product_category/";
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileTmpPath = $_FILES['product_image']['tmp_name'];
        $fileName = basename($_FILES['product_image']['name']);
        $destPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $product_image = $fileName;
        } else {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Image upload failed!'
            ];
            header('Location: ../admin/realPRODUCTS.php');
            exit();
        }
    }

    mysqli_begin_transaction($conn);

    try {
        // Update product details
        $query = "UPDATE products SET product_image = ?, product_name = ?, product_price = ?, product_category = ?, product_description = ? WHERE product_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssdssi", 
            $product_image, $product_name, $product_price, $product_category, $product_description, $product_id);
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Product update failed: " . mysqli_error($conn));
        }
        mysqli_stmt_close($stmt);

        // Commit if both succeed
        mysqli_commit($conn);
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Product and Inventory UPDATED successfully!'
        ];
    } catch (Exception $e) {
        mysqli_rollback($conn);
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error UPDATING: ' . $e->getMessage()
        ];
    }

    header('Location: ../admin/realPRODUCTS.php');
    exit();
}
?>
