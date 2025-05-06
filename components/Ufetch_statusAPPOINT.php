<?php
include "../db_connect/db_connection.php";


$userid = $_SESSION['userid']; // Get the logged-in user's ID

// Query to check if this user has any pending appointments
$status_query = "SELECT 1 FROM appointment WHERE userid = ? AND status = 'Pending' LIMIT 1";
$stmt = $conn->prepare($status_query);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();

// If a pending appointment exists, do NOT show the button
$has_pending_appointment = $result->num_rows > 0;

$stmt->close();
?>