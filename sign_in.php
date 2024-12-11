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
        <form action="process_signup.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email"> Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="role"> Role: </label>
            <select id="role" name="role" required>
                <option value="buyer">Buyer</option>
                <option value="seller">Buyer</option>
                <option value="admin">Buyer</option>
            </select>

            <button type="submit" class="btn">Sign Up</button>
        </form>
    </main>
</body>
</html>