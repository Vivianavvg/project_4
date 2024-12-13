<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'buyer') {
    // Redirect to login if not logged in or not a buyer
    header("Location: login.php");
    exit();
}

// Continue with page content for buyers...
echo "<h1>Welcome, " . $_SESSION['username'] . " (Buyer)</h1>";
?>
