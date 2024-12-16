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

$sql_insert_users = "INSERT INTO users(firstname, lastname, username, email, password_hash, users_role) VALUES
    ('John', 'Doe', 'jdoe', 'jdoe@example.com', 'hashedpassword1', 'seller' ),
    ('Jane' 'Smith', 'jsmith', 'jsmith@example.com', 'hashedpassword2', 'seller' ),
    ('Emily', 'Davis', 'edavis', 'edavis@example.com', 'hashedpassword3', 'seller'),
    ('Micheal', 'brown', 'mbrown', 'mbrown@example.com', 'hashedpassword4', 'seller')";

if ($conn->query($sql_insert_users) === TRUE ){
    echo " users inserted successfully";
} else {
    echo "error inserting users: " . $conn->error;
}

if ($conn->query($sql) === TRUE ){
    echo "Table users created successfully";
} else {
    echo "error creating table: " . $conn->error;
}


//insert fake data into the new table



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

if ($conn->query($sql_properties) === TRUE ){
    echo "Table 'properties' created successfully";
} else {
    echo "error creating properties: " . $conn->error;
}




    //SQL to insert values into properties table
    $sql_insert_properties = "INSERT INTO properties ( 
    
        user_id,
        location,
        age,
        floor_plan,
        square_footage,
        num_bedrooms,
        num_bathrooms,
        has_garden ,
        has_parking,
        nearby_facilities ,
        nearby_roads,
        property_tax ,           
        price,
        image_path
    ) VALUES    

    (1, '123 Peachtree St, Atlanta, GA 30303', 2014, 'floor_plan_1.jpg', 2300, 2, 2, 1, 1, 'Piedmont park', 'I-85', 52500.00, 750000.00, 'house_1.jpg'),
    (2, '456 Piedmont Ave, Atlants, GA 30308', 1975, 'floor_plan_2', 2000, 4, 3, 1, 1, 'Piedmont park', 'I-75', 66500.0, 950000.00, 'house_2.jpg'),
    (3, '789 Lenos Rd NE, Atlanta, GA 30324', 2001, 'floor_plan_3', 1500, 3, 2, 0, 1, 'lenox mall', 'MARTA', 38500.00, 550000.00, 'house_3.jpg'),
    (4, '1010 Cascade Rd SW, Atlanta, GA 30311', 1998, 'floor_plan_4', 1800, 3, 2, 0, 1, 'GSU', 'MARTA', 42000.00, 600000.00, 'house_4.jpg')

    ";

    if ($conn->query($sql_insert_properties) === TRUE) {
        echo "Properties inserted successfully.<br>";
    } else {
        echo "Error inserting properties" . $conn->error . "<br>";
    }
?>
  
    
