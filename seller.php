<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'seller') {
    // Redirect to login if not logged in or not a seller
    header("Location: login.php");
    exit();
}

// Continue with page content for sellers...
echo "<h1>Welcome, " . $_SESSION['username'] . " (Seller)</h1>";
?>
