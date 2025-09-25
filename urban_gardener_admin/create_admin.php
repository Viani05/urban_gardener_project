<?php
// Database configuration
$host = 'localhost';
$dbname = 'urban_gardener_project_db';
$username = 'root';
$password = '';

try {
    // Connect to database using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Admin details
    $email = 'admin@example.com';
    $plainPassword = 'admin123'; // Password in plain text

    // Hash the password
    $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO urban_gardener_admin (email, password) VALUES (:email, :password)");
    $stmt->execute([
        ':email' => $email,
        ':password' => $hashedPassword
    ]);

    echo "Admin user created successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>