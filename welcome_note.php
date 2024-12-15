<?php

session_start();

if(!isset($_COOKIE['first_login'])) {
    setcookie('first_login', '1', time() + (365 * 24 * 60 * 60), "/");

    $showWelcome = true;
} else {
    $showWelcome = false;
}
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel = "styleSheet" href="welcome.css">
</head>
<body>
    <main>
        <?php if ($showWelcome): ?>
            <!--welcome note for first time visitors -->
            <div class="welcome-note">
                <h2>Welcome!</h2>
                <p>Thank you for choosing RealEstatePro, We're excited to help you find your dream home!
                    We are here to guide you every step of the way, let us help you turn your dreams into reality.</p>
                    <a href="buyer_dashboard.php" class="btn" > Start your journey today!</a>
            </div>
        <?php else: ?>
            <div class="welcome-note">
                <p>Welcome back to RealEstatePro!</p>
                <a href="buyer_dashboard.php" class="btn">Continue Searching</a>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
