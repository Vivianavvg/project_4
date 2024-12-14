<?php

$servername = "localhost";
$username = "jvincent15";
$password = "jvincent15";
$dbname = "jvincent15";

    //create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error){
    echo "could not connect to server\n";
    die("connection failed: " . $conn->connect_error);
}

else{
    echo "connection established\n";
}
//sql to create table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname Varchar(50) NOT NULL,
    lastname Varchar(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    users_role VARCHAR(20) NOT NULL

)";

if ($conn->query($sql) === TRUE ){
    echo "Table users created successfully";
} else {
    echo "error creating table: " . $conn->error;
}

// SQL to create the 'properties' table
$sql_properties = "CREATE TABLE IF NOT EXISTS properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,                    -- Foreign Key to users table
    location VARCHAR(100) NOT NULL,
    age INT NOT NULL,                        -- Age of the property (years)
    floor_plan VARCHAR(255),                 -- Path to image or description
    square_footage INT NOT NULL,
    num_bedrooms INT NOT NULL,
    num_bathrooms INT NOT NULL,
    has_garden BOOLEAN DEFAULT 0,
    has_parking BOOLEAN DEFAULT 0,
    nearby_facilities VARCHAR(255),
    nearby_roads VARCHAR(255),
    property_tax DECIMAL(10, 2),             -- Calculated 7% of the value
    price DECIMAL(10, 2) NOT NULL,           -- Price of the property
    image_path VARCHAR(255),                 -- Path to the property image
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";

if ($conn->query($sql_properties) === TRUE) {
    echo "Table 'properties' created successfully<br>";
} else {
    echo "Error creating 'properties' table: " . $conn->error . "<br>";
}
$conn->close();
?>
    
