<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Real Estate Pro</title>
    <style>
        /* Apply the background image to the body */
        body {
            font-family: Arial, sans-serif;
            background-image: url('signup.png'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
            position: relative;
        }

        /* Text overlay centered inside the form container */
        .overlay-text {
            position: absolute;
            top: 50%;
            left: 40%;
            transform: translate(-50%, -50%);
            font-size: 48px;
            font-weight: bold;
            text-align: center;
            color: black;
            font-family: 'Amatis SE', sans-serif; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0);
        }

        /* Container for the form */
        .auth-page {
            background-color: rgba(255, 255, 255, 255); /* semi-transparent white */
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            z-index: 1;
            position: relative;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        /* Move the form to the right center */
        .auth-page-wrapper {
            position: center;
            right: 50px;
            top: 20%;
        }

        form p {
            margin-bottom: 15px;
            font-size: 16px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        label {
            font-size: 16px;
            color: #555;
        }

        .auth-page p {
            font-size: 14px;
            text-align: center;
        }

        .auth-page p a {
            color: #007bff;
            text-decoration: none;
        }

        .auth-page p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Find your home text overlay -->
    <div class="overlay-text">
        FIND YOUR <br> DREAM HOME
    </div>

    <!-- Auth page container -->
    <div class="auth-page-wrapper">
        <main class="auth-page">
            <h1>Create an account</h1>
            <form action="signupToDB.php" method="POST">
                <p>First Name: <input name="firstName" type="text" required></p>
                <p>Last Name: <input name="lastName" type="text" required></p>
                <p>Username: <input name="username" type="text" required></p>
                <p>Email: <input name="email" type="email" required></p>
                <p>Password: <input name="password" type="password" required></p>
                <p>Confirm Password: <input name="confirmPassword" type="password" required></p>
                <p>
                    <label for="role">Role:</label>
                    <select id="role" name="role" required>
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                        <option value="admin">Admin</option>
                    </select>
                </p>
                <button type="submit" class="btn">Sign Up</button>
            </form>
        </main>
    </div>
</body>
</html>
