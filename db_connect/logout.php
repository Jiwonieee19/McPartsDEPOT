<?php
session_start();
session_unset();  
session_destroy();  // Destroy the session
header("Location: ../landing.php");  // Redirect to login page
exit();
?>