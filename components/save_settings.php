<?php
session_start();
include("../db_connect/db_connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_id = $_POST['staff_id'];
    $staff_username = $_POST['staff_username'];
    $staff_password = $_POST['staff_password'];
    $confirm_password = $_POST['confirm_password'];

    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        // Retrieve current user data
        $stmt = mysqli_prepare($conn, "SELECT staff_profile, staff_password FROM staffs WHERE staff_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $staff_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $staffs = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if (!$staffs) {
            throw new Exception('User not found!');
        }

        // Handle profile image upload
        if (!empty($_FILES['staff_profile']['name'])) {
            $target_dir = "../admin/assets/images/profiles/";
            $file_name = basename($_FILES["staff_profile"]["name"]);
            $target_file = $target_dir . $file_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (in_array($imageFileType, ["jpg", "jpeg", "png"])) {
                if (move_uploaded_file($_FILES['staff_profile']["tmp_name"], $target_file)) {
                    $profile_image = $file_name;
                    $_SESSION['staff_profile'] = $file_name;
                } else {
                    throw new Exception('Error uploading image');
                }
            } else {
                throw new Exception('INVALID image format! Allowed formats: JPG, JPEG, PNG');
            }
        } else {
            $profile_image = $staffs['staff_profile']; // Keep existing image
        }

        // Handle password update (only if user enters a new password)
        if (!empty($staff_password) || !empty($confirm_password)) {
            if ($staff_password !== $confirm_password) {
                throw new Exception('Passwords do NOT match!');
            }
            $hashed_password = password_hash($staff_password, PASSWORD_DEFAULT);
        } else {
            $hashed_password = $staffs['staff_password']; // Keep old password if no input
        }

        // Update user data
        $query = "UPDATE staffs SET staff_username = ?, staff_password = ?, staff_profile = ? WHERE staff_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sssi', $staff_username, $hashed_password, $profile_image, $staff_id);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception('Error UPDATING Staff!');
        }

        mysqli_stmt_close($stmt);

        // Commit transaction
        mysqli_commit($conn);

        $_SESSION['staff_username'] = $staff_username;
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Staff UPDATED successfully!'
        ];

    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($conn);

        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => $e->getMessage()
        ];
    }

    mysqli_close($conn);

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
