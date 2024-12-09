<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Lab 5b</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Additional inline styles for centering */
        .container {
            text-align: center;
            margin-top: 100px;
        }

        .links {
            margin-top: 20px;
        }

        .links a {
            display: inline-block;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to Lab 5b: PHP CRUD</h2>
        <p>This is a simple PHP web application demonstrating CRUD functionality.</p>

        <div class="links">
            <a href="register.php" class="button">Register</a>
            <a href="login.php" class="button">Login</a>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="view_user.php" class="button">View Users</a>
                <a href="logout.php" class="button">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
