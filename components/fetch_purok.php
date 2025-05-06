<?php
include "../db_connect/db_connection.php";

// Get the selected Purok from the query string
$purok = isset($_GET['purok']) ? $_GET['purok'] : 'all';  // Default to 'all'

// Build the query to filter the users by Purok
if ($purok == 'all') {
    // No filter, fetch all data
    $query = "SELECT * FROM users";
} else {
    // Filter by selected Purok
    $query = "SELECT * FROM users WHERE purok = ?";
}

// Prepare and execute the query
$stmt = mysqli_prepare($conn, $query);
if ($purok != 'all') {
    mysqli_stmt_bind_param($stmt, 'i', $purok);
}
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Fetch and display the filtered results
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='user-card'>";
        echo "<p>Name: " . $row['firstname'] . " " . $row['lastname'] . "</p>";
        echo "<p>Purok: " . $row['purok'] . "</p>";
        // Add other fields as needed
        echo "</div>";
    }
} else {
    echo "<p>No results found for Purok $purok.</p>";
}

mysqli_stmt_close($stmt);
?>
