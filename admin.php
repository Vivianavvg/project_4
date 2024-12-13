<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    // Redirect to login if not logged in or not an admin
    header("Location: login.php");
    exit();
}

// Continue with page content for admins...
echo "<h1>Welcome, " . $_SESSION['username'] . " (Admin)</h1>";
?>
