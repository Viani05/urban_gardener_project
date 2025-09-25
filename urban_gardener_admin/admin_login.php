<?php
session_start();

// Database connection settings
$host = 'localhost';
$db = 'urban_gardener_project_db';
$user = 'root';
$pass = ''; // Change this to your actual password
// Create connection
$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prevent SQL injection
$email = $conn->real_escape_string($email);

// Query to check user
$sql = "SELECT * FROM urban_gardener_admin WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    // Verify password
    if (password_verify($password, $user['password'])) {
        // Login success
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_email'] = $user['email'];
        header("Location: dashboard.html");
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Admin user not found.";
}

$conn->close();
?>