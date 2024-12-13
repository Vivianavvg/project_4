<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Real Estate Pro</title>
    <link rel="stylesheet" href="login_signup.css">
</head>
<body>
    <main class="auth-page">
        <h1>Create an account</h1>
        <form action="signupToDB.php" method="POST">
            <p>First Name: <input name="firstName" type="text" required></p>
            <p>Last Name: <input name="lastName" type="text" required></p>
            <p>Username: <input name="username" type="text" required></p>
            <p>Email: <input name="email" type="email" required></p>
            <p>Password: <input name="password" type="password" required></p>
            <p>Confirm Password: <input name="confirmPassword" type="password" required></p>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="buyer">Buyer</option>
                <option value="seller">Seller</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </main>
</body>
</html>
