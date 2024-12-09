<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'Lab_5b');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $sql = "SELECT * FROM users WHERE matric = '$matric'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newMatric = $_POST['matric'];  // Get the new matric value
    $name = $_POST['name'];
    $accessLevel = $_POST['accessLevel'];

    // Update the user data, including matric
    $sql = "UPDATE users SET matric = '$newMatric', name = '$name', accessLevel = '$accessLevel' WHERE matric = '$matric'";

    if ($conn->query($sql) === TRUE) {
        header('Location: view_user.php');
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<link rel="stylesheet" type="text/css" href="style.css">

<h2>Update User</h2>
<form method="POST" action="">
    <!-- Display and allow editing of matric -->
    Matric: <input type="text" name="matric" value="<?= $user['matric'] ?>" required><br>
    
    <!-- Name field -->
    Name: <input type="text" name="name" value="<?= $user['name'] ?>" required><br>
    
    <!-- Access Level dropdown -->
    Access Level:
    <select name="accessLevel">
        <option value="Admin" <?= $user['accessLevel'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
        <option value="User" <?= $user['accessLevel'] == 'User' ? 'selected' : '' ?>>User</option>
    </select><br>
    
    <!-- Submit button -->
    <button type="submit">Update</button>
</form>
