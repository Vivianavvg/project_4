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

// Fetch properties listed by the seller
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM properties WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Welcome, <?php echo $_SESSION['username']; ?> (Seller)</h1>
        <nav>
            <a href="login.php">Logout</a>
        </nav>
    </header>

    <main>
        <h2>Your Listed Properties</h2>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <!-- Display properties if any are listed -->
            <div class="property-list">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="property-card">
                        <img src="<?php echo $row['image_url']; ?>" alt="Property Image">
                        <h3><?php echo $row['location']; ?></h3>
                        <p>Price: $<?php echo number_format($row['price']); ?></p>
                        <p>Bedrooms: <?php echo $row['bedrooms']; ?> | Bathrooms: <?php echo $row['bathrooms']; ?></p>
                        <p>Square Footage: <?php echo $row['square_footage']; ?> sqft</p>
                        <p>Garden: <?php echo $row['has_garden'] ? 'Yes' : 'No'; ?> | Parking: <?php echo $row['has_parking'] ? 'Yes' : 'No'; ?></p>
                        <a href="property_details.php?id=<?php echo $row['id']; ?>" class="btn">View Details</a>
                        <a href="delete_property.php?id=<?php echo $row['id']; ?>" class="btn delete-btn" onclick="return confirm('Are you sure you want to delete this property?')">Delete</a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <!-- No properties listed, show the "Add Property" card -->
            <div class="add-property-card">
                <a href="add_property.php" class="btn add-property-btn">+ Add Property</a>
                <p>You have not listed any properties yet. Click the button to add a new property.</p>
            </div>
        <?php endif; ?>

    </main>

</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
