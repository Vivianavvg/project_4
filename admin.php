<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    // Redirect to login if not logged in or not an admin
    header("Location: login.php");
    exit();
}

// Database configuration
$servername = "localhost";
$username = "jvincent15";
$password = "jvincent15";
$dbname = "jvincent15";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch total properties
    $totalProperties = $conn->query("SELECT COUNT(*) FROM Property")->fetchColumn();

    // Fetch properties
    $propertiesStmt = $conn->prepare("SELECT * FROM Property");
    $propertiesStmt->execute();
    $properties = $propertiesStmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch top areas by property count
    $topAreasStmt = $conn->prepare("
        SELECT Address, COUNT(*) as total
        FROM Property
        GROUP BY Address
        ORDER BY total DESC
        LIMIT 5
    ");
    $topAreasStmt->execute();
    $topAreas = $topAreasStmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            text-align: center;
            background-color: #5F9EA0; 
            color: #333333;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-size: 1em; 
            font-weight: bold;
            padding: 8px;
            text-align: left;
        }
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .summary {
            margin: 20px;
            padding: 10px;
            background-color: #fff;
            color: #000;
            border: 1px solid black;
            width: 30%;
            text-align: left;
            font-weight: bold;
            font-size: 1.2em;
            float: left;
        }
        .center-content {
            margin: 20px auto;
            width: 80%;
        }
        section {
            overflow: hidden; 
        }
    </style>
</head>

<body>
    <!-- Welcome Section -->
    <h1>Welcome, <?php echo $_SESSION['username']; ?> </h1>
    <h1>Admin Dashboard</h1>

    <!-- Total Properties Section -->
    <div class="summary">
        Total Properties: <?php echo $totalProperties; ?>
    </div>

    <!-- Top Areas Section -->
    <section class="center-content">
        <h2>Top Areas with Highest Listings</h2>
        <table border="1">
            <tr>
                <th>Area</th>
                <th>Number of Listings</th>
            </tr>
            <?php foreach ($topAreas as $area): ?>
                <tr>
                    <td><?php echo htmlspecialchars($area['Address']); ?></td>
                    <td><?php echo $area['total']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <!-- Property Listings Section -->
    <section class="center-content">
        <h2>Property Listings</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php foreach ($properties as $property): ?>
                <tr>
                    <td><?php echo htmlspecialchars($property['Property_ID']); ?></td>
                    <td><?php echo htmlspecialchars($property['Address']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</body>
</html>
