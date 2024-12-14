<?php
session_start();

// Check if the user is logged in and is a seller
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'seller') {
    header("Location: login.php");
    exit();
}

// Check if the property ID is set and valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $property_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Database connection
    $servername = "localhost";
    $username = "jvincent15";
    $password = "jvincent15";
    $dbname = "jvincent15";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the property belongs to the logged-in seller
    $check_sql = "SELECT * FROM properties WHERE id = $property_id AND user_id = $user_id";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Delete the property if it belongs to the seller
        $sql = "DELETE FROM properties WHERE id = $property_id";
        if (mysqli_query($conn, $sql)) {
            echo "Property deleted successfully!";
            // Redirect back to the seller's dashboard
            header("Location: seller.php");
        } else {
            echo "Error deleting property: " . mysqli_error($conn);
        }
    } else {
        echo "This property does not belong to you or does not exist.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid property ID.";
}
?>
