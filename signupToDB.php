<!doctype html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Adding signup to DB</title>
</head>
<body>
    <div>
<?php
$servername = "localhost";
$username = "vvacagonzalez1";
$password = "vvacagonzalez1";
$dbname = "vvacagonzalez1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']; // Raw password from the form
$role = $_POST['role'];

// Hash the password before saving it
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert into users table
$sql = "INSERT INTO users (firstname, lastname, username, email, password_hash, users_role) 
        VALUES ('$firstName', '$lastName', '$username', '$email', '$hashedPassword', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "New signup added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
    <a href="login.php"><input type="button" id="btn1" value="OK"></a>
    </div>
</body>
</html>
