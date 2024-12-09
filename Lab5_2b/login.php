<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'Lab_5b');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $matric = $_POST['matric'];

    $sql = "SELECT * FROM users WHERE matric = '$matric'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['user'] = $matric;
        header('Location: view_user.php');
        exit();
    } else {
        echo "Invalid matric!";
    }

    $conn->close();
}
?>

<link rel="stylesheet" type="text/css" href="style.css">

<h2>Login</h2>
<form method="POST" action="">
    Matric: <input type="text" name="matric" required><br>
    <button type="submit">Login</button>
</form>
<a href="register.php">Go to Registration</a>
