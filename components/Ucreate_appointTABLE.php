<?php
// Start session for notifications
session_start();
include "../db_connect/db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $lastname = $_SESSION['lastname'];
    $concern = $_POST['concern'];
    $message = $_POST['msg'];

    // Combine Concern and Message into one column
    $combined_msg = "Concern: " . $concern . " - " . $message;
    $status = "PENDING";

    // Prepare query
    $query = "INSERT INTO appointment (userid, username, email, lastname, status, msg, apcreation) 
              VALUES (?, ?, ?, ?, ?, ?, NOW())";

    if ($stmt = $conn->prepare($query)) {
        // Bind parameters correctly
        $stmt->bind_param("isssss", $userid, $username, $email, $lastname, $status, $combined_msg);

        if ($stmt->execute()) {
            // Set success message in session
            $_SESSION['notification'] = [
                'type' => 'success', // Bootstrap success message
                'message' => 'Appointment CREATED Successfully!'
            ];
        } else {
            // Set error message in session
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Error: Could not CREATE appointment.'
            ];
        }

        $stmt->close();
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error: Database query failed.'
        ];
    }

    $conn->close();

    // Redirect to user dashboard
    header('Location: ../admin/uAPPOINTMENTS.php');
    exit();
} else {
    $_SESSION['notification'] = [
        'type' => 'warning',
        'message' => 'Invalid Request!'
    ];
    header('Location: ../admin/uAPPOINTMENTS.php');
    exit();
}
?>
