<?php

$host="localhost";
$username = "username";
$password = "username";
$dbname = "username";

    //create connection

$conn = new mysqli($host, $username, $password, $dbname);

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
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL,

)";

if ($conn->query($sql) === TRUE ){
    echo "Table users created successfully";
} else {
    echo "error creating table: " . $conn->error;
}

$conn->close();
?>
    
