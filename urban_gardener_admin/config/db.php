<?php
// Start session once (safe if reused in multiple files)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Database configuration
$host = 'localhost';
$username = 'root';
$password = ''; // Leave empty if no MySQL password
$database = 'urban_gardener_project_db';
// Create MySQLi connection
$mysqli = new mysqli($host, $username, $password, $database);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>