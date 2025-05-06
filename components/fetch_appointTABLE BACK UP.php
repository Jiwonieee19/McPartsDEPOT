<?php

include "../db_connect/db_connection.php";

// $userid = $_SESSION['userid']; // Get the logged-in user's ID

$query = "SELECT * FROM appointment";
$result = mysqli_query($conn, $query); // Fetch result set

// Now you can use while loop to fetch data
// while ($row = $result->fetch_assoc()) {

// }
