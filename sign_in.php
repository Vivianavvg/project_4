<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Real Estate Pro</title>
    <link rel = "stylesheet" href="login_signup.css">
</head>
<body>
    <main class="auth-page">
        <h1>Create an account</h1>
        <form action="sign_in.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email"> Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="role"> Role: </label>
            <select id="role" name="role" required>
                <option value="buyer">Buyer</option>
                <option value="seller">seller</option>
                <option value="admin">admin</option>
            </select>

            <button type="submit" class="btn">Sign Up</button>
        </form>
    </main>
</body>
</html>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //handle form submissions
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password= $_POST['password'];
    $users_role = $_POST['role'];

    //hash the password for security

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $host = "localhost";
    $username_db = "";
    $password_db = "";
    $dbname = "";

    $conn = new mysqli($host, $username_db, $password_db, $dbname);

    //check connection

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, email, password_hash, users_role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if($stmt === false) {
        die("error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ssss", $username, $email, $password_hash, $users_role);

    if($stmt->execute()){
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    echo "Username: $username, Email: $email, Role: $users_role\n";
    error_log($stmt->error, 3, '/var/log/app_errors.log');
    echo "An error occurred. Please try again.";




    $stmt->close();
    $conn->close();
}
?>