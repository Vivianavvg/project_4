<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Real Estate Pro</title>
    <link rel="stylesheet" href="login_signup.css">
</head>
<body>
    <main class="auth-page">
        <h1>Login</h1>
        <form action="loginToDB.php" method="POST">
            <p>Username: <input name="username" type="text" required></p>
            <p>Password: <input name="password" type="password" required></p>
            <button type="submit" class="btn">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </main>
</body>
</html>
