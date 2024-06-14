<!-- check_login.php -->
<?php
session_start();

// Check if the user is logged in by verifying the existence of a session variable
if (isset($_SESSION['user_id'])) {
    // If the user is logged in, retrieve cart information
    require_once('database_connection.php'); // Assuming this file contains database connection code

    // Get user ID from session or email
    $user_id = $_SESSION['user_id']; // Assuming user ID is stored in session
    // If user ID is stored in email instead of session
    // $email = $_SESSION['email'];
    // Retrieve user ID from database based on email

    // Retrieve cart information from the orders table
    $query = "SELECT * FROM orders WHERE user_id = '$user_id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $cart_information = mysqli_fetch_assoc($result);
        // Redirect to checkout.php and pass cart information as query parameters
        header("Location: checkout.php?order_id=" . $cart_information['order_id']);
        exit(); // Ensure that script execution stops after redirection
    } else {
        // Handle database query error
        echo "Error: " . mysqli_error($connection);
    }
} else {
    // If the user is not logged in, redirect to login.php
    header("Location: login.php");
    exit(); // Ensure that script execution stops after redirection
}
?>
