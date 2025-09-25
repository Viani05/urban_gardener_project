<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "urban_gardener_project_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Orders</title>
    <link rel="stylesheet" href="style.css"> <!-- Use your existing styles -->
</head>
<body>
    <div class="container">
        <h2>Customer Orders</h2>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['order_id'] ?></td>
                <td><?= $row['customer_name'] ?></td>
                <td><?= $row['product_name'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td><?= $row['total_price'] ?></td>
                <td><?= $row['order_date'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>