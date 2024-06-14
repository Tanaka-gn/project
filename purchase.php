<?php
// Include connection to the database
include 'connection.php';

// Start session to store user information
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect user to login page if not logged in
    header("Location: login.php");
    exit;
}

// Retrieve user_id from session
$user_id = $_SESSION['user_id'];

// Check if product_id is provided and is valid for adding to cart

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Check if the product_id exists in the products table
    $sql_check_product = "SELECT * FROM products WHERE product_id = '$product_id'";
    $result_check_product = $conn->query($sql_check_product);

    if ($result_check_product->num_rows > 0) {
        // Fetch the product details
        $product = $result_check_product->fetch_assoc();
        $cost = $product['cost']; 

        // Define status for adding to cart
        $status = 'added to cart';

        // Insert data into cart table
        $sql = "INSERT INTO cart (user_id, product_id, cost, status) VALUES ('$user_id', '$product_id', '$cost', '$status')";

        if ($conn->query($sql) === TRUE) {
            //  redirect user to the same page to refresh
            header("Location: purchase.php");
            exit;
        } else {
            // display error message
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Product not found.";
    }
}



// Check if product_id is provided and is valid for removing from cart
if (isset($_GET['remove_product_id'])) {
    $product_id = $_GET['remove_product_id'];

    // Remove product from cart table
    $sql_remove = "DELETE FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";

    if ($conn->query($sql_remove) === TRUE) {
        //redirect user to the same page to refresh
        header("Location: purchase.php");
        exit;
    } else {
        //display error message
        echo "Error: " . $sql_remove . "<br>" . $conn->error;
    }
}

// Query to retrieve all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);



// Query to retrieve all cart items for the logged-in user
$cart_sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
$cart_result = $conn->query($cart_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Page</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
}


h1, h2 {
    color: #333;
    margin-bottom: 20px;
}

.product, .cart-item {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px 0;
    background-color: #fff;
}

.product h2, .cart-item h2 {
    margin: 0 0 10px 0;
    color: maroon;
}

.product p, .cart-item p {
    margin: 5px 0;
}

.product a, .cart-item a {
    color: maroon;
    text-decoration: none;
}

.product a:hover, .cart-item a:hover {
    text-decoration: underline;
}

button#checkoutbtn {
    background-color: maroon;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    display: block;
    margin: 20px 0;
    font-size: 16px;
}

button#checkoutbtn:hover {
    background-color: #800000;
}

    </style>
</head>
<body>
<?php
// Include connection to the database
include 'navbarpages.php';
?>
    <h1>Purchase Page</h1>

    <h2>Products</h2>
    <button type="btn" id= "orderbutton"> View Order History </button>
    <?php
    // Check if there are any products in the database
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<h2>" . $row["product_name"] . "</h2>";
            echo "<p>Product ID: " . $row["product_id"]. "</p>";
            echo "<p>Description: " . $row["description"]. "</p>";
            echo "<p>Price: $" . $row["cost"]. "</p>";
            echo "<p>Image: <img src='" . htmlspecialchars($row["image"], ENT_QUOTES, 'UTF-8') . "' alt='" . htmlspecialchars($row["product_name"], ENT_QUOTES, 'UTF-8') . "'></p>";
            echo "<a href='purchase.php?product_id=".$row["product_id"]."'>Add to Cart</a>";
            echo "</div>";
        }
    } else {
        echo "<p>No products found.</p>";
    }
    ?>

<?php
    // Include the services display and add-to-cart functionality
    include 'servicepurchase.php';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
    ?>
    <h2>Your Cart </h2>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
    <?php
// Check if thereare any items in the cart for the user
if ($cart_result->num_rows > 0) {
    // Output data of each row
    while ($cart_row = $cart_result->fetch_assoc()) {
        // Check if the item in the cart is a product
        if ($cart_row["product_id"] !== null) {
            // Get product details for each cart item
            $product_id = $cart_row["product_id"];
            $product_sql = "SELECT * FROM products WHERE product_id = '$product_id'";
            $product_result = $conn->query($product_sql);
            $product = $product_result->fetch_assoc();

            echo "<div class='cart-item'>";
            echo "<h2>" . $product["product_name"] . "</h2>";
            echo "<p>Product ID: " . $product["product_id"] . "</p>";
            echo "<p>Description: " . $product["description"] . "</p>";
            echo "<p>Price: $" . $product["cost"] . "</p>";
            echo "<a href='purchase.php?remove_product_id=" . $product["product_id"] . "'>Remove from Cart</a>";
            echo "</div>";
        } 
        // Check if the item in the cart is a service
        elseif ($cart_row["service_id"] !== null) {
            $service_id = $cart_row["service_id"];
            $service_sql = "SELECT * FROM services WHERE service_id = '$service_id'";
            $service_result = $conn->query($service_sql);
            $service = $service_result->fetch_assoc();

            echo "<div class='cart-item'>";
            echo "<h2>" . $service["service_name"] . "</h2>";
            echo "<p>Service ID: " . $service["service_id"] . "</p>";
            echo "<p>Description: " . $service["description"] . "</p>";
            echo "<p>cost: $" . $service["cost"] . "</p>";
            echo "<a href='purchase.php?remove_service_id=" . $service["service_id"] . "'>Remove from Cart</a>";
            echo "</div>";
        }
    }
} else {
    echo "<p>Your cart is empty.</p>";
}
?>
<button type="button" id= "checkoutbtn"> Continue to checkout </button>


   <script>
  document.getElementById("orderbutton").addEventListener("click", function() {
            window.location.href = "orderhistory.php";
        });

    document.addEventListener("DOMContentLoaded", function() {
  // Find the button element by its id
  var checkoutBtn = document.getElementById("checkoutbtn");

  
  checkoutBtn.addEventListener("click", function() {
    // Redirect the user to checkout.php
    window.location.href = "checkout.php";
  });
});

   </script>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
