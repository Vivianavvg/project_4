<?php
session_start();

// Check if the user is logged in and is a buyer
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'buyer') {
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



//fetch all properties from the properties table

//$sql_fetch_properties = "SELECT * FROM properties";
//$result = $conn->query($sql_fetch_properties);


//handle search form submission

$search_query="";
$min_price = "";
$max_price = "";
$properties = [];
$search_results=[];


if (empty($search_results)) {
    $sql_fetch_properties = "SELECT * FROM properties";
    $result = $conn->query($sql_fetch_properties);
    $search_results = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $search_query = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : "";
    $min_price = isset($_GET['min_price']) ? (float)$_GET['min_price'] : "";
    $max_price = isset($_GET['max_price']) ? (float)$_GET['max_price'] : "";

    //Build the sql query

    $sql_fetch_properties = "SELECT * FROM properties WHERE 1=1";
    
    if (!empty($search_query)) {
        $sql_fetch_properties .= " AND location LIKE '%$search_query%'";
    }

    if(!empty($min_price)) {
        $sql_fetch_properties .= " AND price >= $min_price";
    }

    if (!empty($max_price)) {
        $sql_fetch_properties .= " AND price <= $max_price";
    }

    //Execute the query

    $result = $conn->query($sql_fetch_properties);

    if ($result && $result->num_rows > 0) {
        $properties = $result->fetch_all(MYSQLI_ASSOC);
    }
} else {
    //fetch all properties by default
    $sql_fetch_properties = "SELECT * FROM properties";
    $result = $conn -> query($sql_fetch_properties);

    if ($result && $result->num_rows > 0){
        $properties = $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Buyer Dashboard </title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        h1 { text-align: center; margin: 20px 0; }
        .search-bar { text-align: center; margin: 20px 20px; }
        .search-bar input { padding: 10px; width: 200px; margin: 5px; }
        .search-bar button { padding: 10px; }
    </style>
</head>
<body>
    <h1> Welcome to the buyer dashboard!</h1>
    <div class="search-bar">
        <form action="buyer_dashboard.php" method="get">
            <input type = "text" name="search" placeholder="Search by location" value="<?php echo htmlspecialchars($search_query); ?>">
            <input type="number" name="min_price" placeholder="Min Price" value="<?php echo htmlspecialchars($min_price); ?>">
            <input type="number" name="max_price" placeholder="Max Price" value="<?php echo htmlspecialchars($max_price); ?>" >
            <button type = "submit">Search</button>
        
        </form>
    </div>
    <div class="property-list">
        <?php if (!empty($properties)): ?>
            <?php foreach ($properties as $property): ?>
                    <div class="property-card">
                        <h3><?php echo $property['location']; ?></h3>
                        <p>Price: $<?php echo number_format($property['price']); ?></p>
                        <p>Bedrooms: <?php echo $property['bedrooms']; ?> | Bathrooms: <?php echo $property['bathrooms']; ?></p>
                        <p>Square Footage: <?php echo $property['square_footage']; ?> sqft</p>
                        <p>Garden: <?php echo $property['has_garden'] ? 'Yes' : 'No'; ?> | Parking: <?php echo $property['has_parking'] ? 'Yes' : 'No'; ?></p>
                        <a href="property_details.php?id=<?php echo $property['id']; ?>" class="btn">View Details</a>
                    </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No properties found.</p>
        <?php endif; ?>
    </div>

</body>
</html>
