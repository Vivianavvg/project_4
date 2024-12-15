<?php

if(!isset($_GET['id']) || empty($_GET['id'])) {
    echo "property ID is missing!";
    exit();
}


// Database connection
$servername = "localhost";
$username = "vvacagonzalez1";
$password = "vvacagonzalez1";
$dbname = "vvacagonzalez1";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



//fetch all properties from the properties table


$property_id = (int)$_GET['id'];
$sql_fetch_property = "SELECT * FROM properties WHERE id = $property_id";
$result = $conn->query($sql_fetch_property);

if ($result && $result-> num_rows > 0) {
    $property = $result->fetch_assoc();
} else {
    echo "property not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property details</title>
    <style>
        body  { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .property-details { max-width: 800px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .property-details img { width: 100%; border-radius: 5px; }
        .property-details p { line-height: 1.6; }
        .back-link { display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: #007BFF; color: #fff; text-decoration: none; border-radius: 5px;}
        .back-link:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="property-details">
        <?php if (!empty($property['image_path'])): ?>
            <img src="<?php echo htmlspecialchars($property['image_path']); ?>" alt="property image">
            <?php else: ?>
                <img src="defualt.png" alt="No image available">
                <?php endif; ?>
                <h1><?php echo htmlspecialchars($property['location']); ?></h1>
                <p><strong>Price:</strong> $<?php echo number_format($property['price'], 2); ?></p>
                <p><strong>Bedrooms:</strong> <?php echo htmlspecialchars($property['num_bedrooms']); ?></p>
                <p><strong>Bathrooms:</strong> <?php echo htmlspecialchars($property['num_bathrooms']); ?></p>
                <p><strong>Square:</strong> <?php echo htmlspecialchars($property['square_footage']); ?></p>
                <p><strong>Year:</strong> <?php echo htmlspecialchars($property['age']); ?></p>
                <p><strong>Nearby:</strong> <?php echo htmlspecialchars($property['nearby_facilities']); ?></p>
                <a href="buyer_dashboard.php" class="back-link">Back to Dashboard</a>
    </div>
</body>
</html>                


