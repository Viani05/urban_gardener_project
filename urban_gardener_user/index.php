<?php
// Start session if needed
session_start();

// Optional: You can load data from a database here in the future
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Urban Gardener - Home</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="left">
            <span>Daily: 7:00am - 6:00pm</span>
        </div>
        <div class="right">
            <span>user@urbangardener.com | +91 98765 43210</span>
        </div>
    </div>

    <!-- Header / Navbar -->
    <header class="main-header">
        <div class="logo">Urban <span>Gardener</span></div>
        <nav>
            <a href="home.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="view_plants.php">View Plants</a>
            <a href="contact.html">Contact</a>
            <a href="login.html">Login</a>
            <a href="register.html">Register</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="zoom">
        <img src='images/zoom.jpg'alt="Urban Gardening" class="zoom-img">
        <div class="zoom-text">
            <h1>Greenspace,Anytime,Anywhere</h1>
        </div>
    </section>
</body>
</html>