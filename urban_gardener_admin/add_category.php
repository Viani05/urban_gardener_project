<?php
require_once 'config/db.php'; // Adjust the path as needed
global $mysqli;

// Validate and sanitize input
$category_name = trim($_POST['category_name']);

if (empty($category_name)) {
    echo "<script>alert('Category name is required.'); window.location='add_category.html';</script>";
    exit;
}

// Insert into database
$date_created = date('Y-m-d'); // Today's date

$stmt = $mysqli->prepare("INSERT INTO categories (category_name, created_at) VALUES (?, ?)");
$stmt->bind_param("ss", $category_name, $date_created);

if ($stmt->execute()) {
    echo "<script>alert('Category added successfully!'); window.location='add_category.html';</script>";
} else {
    echo "<script>alert('Failed to add category.'); window.location='add_category.html';</script>";
}

$stmt->close();
?>