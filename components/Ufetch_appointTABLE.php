<?php

include "../db_connect/db_connection.php";

$userid = $_SESSION['userid']; // Get the logged-in user's ID

$query = "SELECT * FROM appointment WHERE userid = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result(); // Fetch result set


$status = 'APPROVED'; // Example status value
$query = "SELECT * FROM history WHERE userid = ? AND status = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("is", $userid, $status);
$stmt->execute();
$result2 = $stmt->get_result(); // Fetch result set


$status = 'DECLINED'; // Example status value
$query = "SELECT * FROM history WHERE userid = ? AND status = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("is", $userid, $status);
$stmt->execute();
$result3 = $stmt->get_result(); // Fetch result set


// Now you can use while loop to fetch data
// while ($row = $result->fetch_assoc()) {

// }
