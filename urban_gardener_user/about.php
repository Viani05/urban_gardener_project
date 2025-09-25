
<?php
$conn = new mysqli("localhost", "root", "", "urban_gardener_project_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT content FROM about_us LIMIT 1");
$row = $result->fetch_assoc();
$content = $row ? $row['content'] : "About content coming soon.";

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - Urban Gardener</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <section class="about-section">
    <div class="container">
      <h1>About Us</h1>
      <p><?php echo nl2br(htmlspecialchars($content)); ?></p>
    </div>
  </section>
</body>
</html>