<?php 
session_start();
include("../db_connect/db_connection.php");


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $userid = $_POST['userid'];


    $query = "DELETE FROM users WHERE userid = ?";


    $stmt = mysqli_prepare($conn, $query);


    mysqli_stmt_bind_param($stmt,"i", $userid);


    if (mysqli_stmt_execute($stmt)) {
        // Set success message
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'USER DELETED successfully!'
        ];
    } else {
        // Set error message
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error DELETING users: ' . mysqli_error($conn)
        ];
    }

    mysqli_stmt_close($stmt);

    header('Location: ../admin/accCUSTOMERS.php');
    exit();

    

}


?>