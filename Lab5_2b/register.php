<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'Lab_5b');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $accessLevel = $_POST['accessLevel'];

    $sql = "INSERT INTO users (matric, name, accessLevel) VALUES ('$matric', '$name', '$accessLevel')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<link rel="stylesheet" type="text/css" href="style.css">

<h2>Register</h2>
<form method="POST" action="">
    Matric: <input type="text" name="matric" required><br>
    Name: <input type="text" name="name" required><br>
    Access Level:
    <select name="accessLevel">
        <option value="Admin">Admin</option>
        <option value="User">User</option>
    </select><br>
    <button type="submit">Register</button>
</form>
<a href="login.php">Go to Login</a>
