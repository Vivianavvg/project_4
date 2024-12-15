<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'seller') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission
    $user_id = $_SESSION['user_id'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $num_bedrooms = $_POST['num_bedrooms'];
    $num_bathrooms = $_POST['num_bathrooms'];
    $square_footage = $_POST['square_footage'];
    $age = $_POST['age'];
    $has_garden = isset($_POST['has_garden']) ? 1 : 0;
    $has_parking = isset($_POST['has_parking']) ? 1 : 0;
    $image_path = ''; // You can handle file uploads here

    // Calculate property tax (7% of the price)
    $property_tax = $price * 0.07;

    // Insert the new property into the database
    $servername = "localhost";
    $username = "jvincent15";
    $password = "jvincent15";
    $dbname = "jvincent15";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO properties (user_id, location, price, num_bedrooms, num_bathrooms, square_footage, age, has_garden, has_parking, property_tax, image_path) 
            VALUES ('$user_id', '$location', '$price', '$num_bedrooms', '$num_bathrooms', '$square_footage', '$age', '$has_garden', '$has_parking', '$property_tax', '$image_path')";

    if (mysqli_query($conn, $sql)) {
        echo "New property added successfully!";
        header("Location: seller.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <link rel="stylesheet" href="style.css"> <!-- Add this line to include the stylesheet -->
</head>
<body>

    <header>
        <h1>Add a New Property</h1>
        <nav>
            <a href="seller.php">Back to Dashboard</a>
        </nav>
    </header>

    <main>
        <h2>Fill in the details below:</h2>

        <form action="add_property.php" method="POST">
            <label for="location">Location:</label><br>
            <input type="text" name="location" required><br>

            <label for="price">Price:</label><br>
            <input type="number" name="price" required><br>

            <label for="num_bedrooms">Number of Bedrooms:</label><br>
            <input type="number" name="num_bedrooms" required><br>

            <label for="num_bathrooms">Number of Bathrooms:</label><br>
            <input type="number" name="num_bathrooms" required><br>

            <label for="square_footage">Square Footage:</label><br>
            <input type="number" name="square_footage" required><br>

            <label for="age">Property Age (Years):</label><br>
            <input type="number" name="age" required><br>

            <label for="has_garden">Has Garden:</label><br>
            <input type="checkbox" name="has_garden"><br>

            <label for="has_parking">Has Parking:</label><br>
            <input type="checkbox" name="has_parking"><br>

            <button type="submit" class="btn">Add Property</button>
        </form>
    </main>

</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 73e1c4b50f84e97bbe1797d1ea0f640654f51636
