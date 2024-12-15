<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Real Estate Pro</title>
    <style> 
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #78877a, #798286); /* Gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .auth-page {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            background: #ffffff; /* White background for form */
        }

        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        p {
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 1.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 1rem;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
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
