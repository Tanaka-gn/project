<?php 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #555;
            color: #f2f2f2;
        }
        .order-history {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .order {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .order:last-child {
            border-bottom: none;
        }
        .order h2 {
            margin: 0 0 10px 0;
            color: maroon;
        }
        .order p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="profile.php">Profile</a>
        <a href="order_history.php">Order History</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="order-history">
        <h1>Order History</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='order'>";
                echo "<h2>Order ID: " . $row["order_id"] . "</h2>";
                echo "<p>Date: " . $row["order_date"] . "</p>";
                echo "<p>Total Cost: $" . $row["total_cost"] . "</p>";
                echo "<p>Status: " . $row["status"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No orders found.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>