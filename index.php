<?php
// index.php

// Set timezone
date_default_timezone_set("UTC");

// Get current hour
$hour = date("H");

// Determine time of day greeting
if ($hour < 12) {
    $greeting = "Good morning";
} elseif ($hour < 18) {
    $greeting = "Good afternoon";
} else {
    $greeting = "Good evening";
}

// Process form input
$name = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
</head>
<body>
    <h1><?php echo $greeting; ?>!</h1>
    <p>Today is <?php echo date("l, F j, Y"); ?>.</p>
    <p>Current server time is: <?php echo date("H:i:s"); ?> UTC</p>

    <h2>Tell us your name:</h2>
    <form method="post" action="">
        <input type="text" name="name" placeholder="Enter your name" required>
        <input type="submit" value="Submit">
    </form>

    <?php if (!empty($name)): ?>
        <h3>Nice to meet you, <?php echo $name; ?>!</h3>
    <?php endif; ?>

    <hr>
    <p>Server Info:</p>
    <ul>
        <li>PHP Version: <?php echo phpversion(); ?></li>
        <li>Server Software: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
        <li>Client IP: <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
    </ul>
</body>
</html>