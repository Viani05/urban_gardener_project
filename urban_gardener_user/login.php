<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        die("All fields are required.");
    }

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            echo "Login successful! Welcome, " . htmlspecialchars($username);
            // Optionally start a session here
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Username not found.";
    }
} else {
    echo "Invalid request.";
}
?>