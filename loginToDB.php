<?php
session_start(); // Start the session to store user data after login

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
$user = $_POST['username'];
$password = $_POST['password']; // The plain password entered by the user

// Query the database to find the user
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user); // "s" indicates the variable is a string
$stmt->execute();
$result = $stmt->get_result();

// Check if a user with that username exists
if ($result->num_rows > 0) {
    // Fetch user data from the database
    $userData = $result->fetch_assoc();
    
    // Verify the password
    if (password_verify($password, $userData['password_hash'])) {
        // Password is correct, start a session
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['username'] = $userData['username'];
        $_SESSION['role'] = $userData['users_role'];

        // Redirect based on the user's role
        if ($userData['users_role'] == 'buyer') {
            header("Location: welcome_note.php");
        } elseif ($userData['users_role'] == 'seller') {
            header("Location: seller.php");
        } elseif ($userData['users_role'] == 'admin') {
            header("Location: admin.php");
        }
        exit();
    } else {
        // Incorrect password
        echo "Incorrect password. Please try again.";
    }
} else {
    // Username not found
    echo "No user found with that username.";
}

$stmt->close();
$conn->close();
?>
