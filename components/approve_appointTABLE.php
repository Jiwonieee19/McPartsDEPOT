<?php
// Start session for notifications
session_start();
include "../db_connect/db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $lastname = $_POST['lastname'];
    $apid = $_POST['apid'];
    $msg = $_POST['msg'];
    $apcreation = $_POST['apcreation'];
    $hismsg = $_POST['hismsg'];

    $status = "APPROVED";

    // Prepare query to insert into history
    $query = "INSERT INTO history (userid, username, email, lastname, apid, status, msg, apcreation, hismsg, hiscreation) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    if ($stmt = $conn->prepare($query)) {
        // Bind parameters correctly
        $stmt->bind_param("isssissss", $userid, $username, $email, $lastname, $apid, $status, $msg, $apcreation, $hismsg);

        if ($stmt->execute()) {
            // Set success message in session
            $_SESSION['notification'] = [
                'type' => 'success', // Bootstrap success message
                'message' => 'Appointment APPROVED Successfully!'
            ];

            // Close the statement before executing another query
            $stmt->close();


        // DELETE DAYUN ANG PENDING NGA APPOINTMENT PRA MAKA APPOINT NSD SI USER
            $deleteQuery = "DELETE FROM appointment WHERE apid = ?";
            if ($stmt = $conn->prepare($deleteQuery)) {
                $stmt->bind_param("i", $apid);
                $stmt->execute();
                $stmt->close();
            } else {
                $_SESSION['notification'] = [
                    'type' => 'danger',
                    'message' => 'Error: Failed to DELETE pending appointment.'
                ];
            }
        } else {
            // Set error message in session
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Error: Could not APPROVE appointment.'
            ];
        }
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error: Database query failed.'
        ];
    }

    // Close the connection
    $conn->close();

    // Redirect to user dashboard
    header('Location: ../admin/APPOINTMENTS.php');
    exit();
} else {
    $_SESSION['notification'] = [
        'type' => 'warning',
        'message' => 'Invalid Request!'
    ];
    header('Location: ../admin/APPOINTMENTS.php');
    exit();
}
?>
