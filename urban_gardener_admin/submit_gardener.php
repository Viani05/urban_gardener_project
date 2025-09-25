<?php
// Database configuration
$host = 'localhost';
$dbname = 'urban_gardener_project_db';
$username = 'root';
$password = '';

try {
    // Establish database connection with PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Validate POST request
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['gardener_name'];
        $email = $_POST['gardener_email'];
        $raw_password = $_POST['gardener_password'];
        $contact = $_POST['gardener_contact'];
        $address = $_POST['gardener_address'];
        $specialist = $_POST['gardener_specialist'];
        $problem = $_POST['problem_reason'];
        $message = $_POST['message'];

        // Hash the password
        $hashed_password = password_hash($raw_password, PASSWORD_BCRYPT);

        // Prepare SQL insert statement
        $stmt = $pdo->prepare("INSERT INTO gardeners 
            (name, email, password, contact, address, specialist, problem_reason, message) 
            VALUES (:name, :email, :password, :contact, :address, :specialist, :problem, :message)");

        // Bind parameters
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashed_password,
            ':contact' => $contact,
            ':address' => $address,
            ':specialist' => $specialist,
            ':problem' => $problem,
            ':message' => $message
        ]);

        echo "Gardener details submitted successfully.";
    } else {
        echo "Invalid request method.";
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>