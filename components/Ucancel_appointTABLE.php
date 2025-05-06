<?php 
session_start();
include("../db_connect/db_connection.php");


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $apid = $_POST['apid'];


    $query = "DELETE FROM appointment WHERE apid = ?";


    $stmt = mysqli_prepare($conn, $query);


    mysqli_stmt_bind_param($stmt,"i", $apid);


    if (mysqli_stmt_execute($stmt)) {
        // Set success message
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'APPOINTMENT CANCELLED successfully!'
        ];
    } else {
        // Set error message
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error CANCELLING appointment: ' . mysqli_error($conn)
        ];
    }

    mysqli_stmt_close($stmt);

    header('Location: ../admin/uAPPOINTMENTS.php');
    exit();

    

}


?>