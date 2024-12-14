<?php
session_start();

// Check if the user is logged in and is a seller
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'seller') {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "jvincent15";
$password = "jvincent15";
$dbname = "jvincent15";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if an ID is provided and delete the property
if (isset($_GET['id'])) {
    $property_id = $_GET['id'];

    // Delete the property
    $sql = "DELETE FROM properties WHERE id = ? AND user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $property_id, $_SESSION['user_id']);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Property deleted successfully!</p>";
    } else {
        echo "<p>Error deleting property: " . mysqli_error($conn) . "</p>";
    }
}

// Redirect back to the seller's dashboard
header("Location: seller.php");
exit();
?>
