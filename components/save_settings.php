<?php
session_start();
include("../db_connect/db_connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Retrieve current user data
    $stmt = mysqli_prepare($conn, "SELECT profile, password FROM users WHERE userid = ?");
    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if (!$user) {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'User not found!'
        ];
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Handle profile image upload
    if (!empty($_FILES['profile']['name'])) {
        $target_dir = "../admin/assets/images/profiles/";
        $file_name = basename($_FILES["profile"]["name"]);
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            if (move_uploaded_file($_FILES['profile']["tmp_name"], $target_file)) {
                $profile_image = $file_name;
            } else {
                $_SESSION['notification'] = [
                    'type' => 'danger',
                    'message' => 'Error uploading image'
                ];
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        } else {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Invalid image format! Allowed formats: JPG, JPEG, PNG'
            ];
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        $profile_image = $user['profile']; // Keep existing image
    }

    // Handle password update (only if user enters a new password)
    if (!empty($password) || !empty($confirm_password)) {
        if ($password !== $confirm_password) {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Passwords do not match!'
            ];
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        // Hash new password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $hashed_password = $user['password']; // Keep old password if no input
    }

    // Update user data
    $query = "UPDATE users SET username = ?, password = ?, profile = ? WHERE userid = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssi', $username, $hashed_password, $profile_image, $userid);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['username'] = $username;
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'User updated successfully!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error updating user!'
        ];
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
