<?php
include "../db_connect/db_connection.php";

// Query 1: Fetch appointments
$query = "SELECT * FROM appointment";
$result = mysqli_query($conn, $query);

// Query 2: Fetch history with a prepared statement
$status = 'APPROVED'; // Example status value
$Approvequery = "SELECT * FROM history WHERE status = ?";

$stmt = mysqli_prepare($conn, $Approvequery);
mysqli_stmt_bind_param($stmt, "s", $status);
mysqli_stmt_execute($stmt);
$result2 = mysqli_stmt_get_result($stmt);

// Query 3: Fetch history with a prepared statement
$status = 'DECLINED'; // Example status value
$Approvequery = "SELECT * FROM history WHERE status = ?";

$stmt = mysqli_prepare($conn, $Approvequery);
mysqli_stmt_bind_param($stmt, "s", $status);
mysqli_stmt_execute($stmt);
$result3 = mysqli_stmt_get_result($stmt);

// Fetch data from $result1 APPOINTMENT WHICH IS PENDING
// while ($row = mysqli_fetch_assoc($result)) {
// }

// Fetch data from the prepared statement APPROVED
// while ($row2 = mysqli_fetch_assoc($result2)) {
// }

// Fetch data from the prepared statement DECLINED
// while ($row3 = mysqli_fetch_assoc($result3)) {
// }


// Close statements
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
