<?php
include 'connection.php';

// Fetch operation from the request
$operation = isset($_GET['operation']) ? $_GET['operation'] : '';

switch($operation) {
    case 'get_users_count':
        getUsersCount($conn);
        break;
    case 'get_products_count':
        getProductsCount($conn);
        break;
    case 'get_orders_count':
        getOrdersCount($conn);
        break;
    case 'get_services_count':
        getServicesCount($conn);
        break;
    case 'get_all_products':
        getAllProducts($conn);
        break;
    case 'add_product':
        addProduct($conn);
        break;
    case 'remove_product':
        removeProduct($conn);
        break;
    case 'modify_product':
        modifyProduct($conn);
        break;
    case 'get_all_services':
        getAllServices($conn);
        break;
    case 'add_service':
        addService($conn);
        break;
    case 'remove_service':
        removeService($conn);
        break;
    case 'get_messages':
        getMessages($conn);
        break;
    default:
        echo "Invalid operation.";
}

function getUsersCount($conn) {
    $sql = "SELECT COUNT(*) as count FROM users";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['count'];
}

function getProductsCount($conn) {
    $sql = "SELECT COUNT(*) as count FROM products";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['count'];
}

function getOrdersCount($conn) {
    $sql = "SELECT COUNT(*) as count FROM orders";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['count'];
}

function getServicesCount($conn) {
    $sql = "SELECT COUNT(*) as count FROM services";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['count'];
}

function getAllProducts($conn) {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "Product ID: " . $row['product_id'] . " - Name: " . $row['product_name'] . " - Description: " . $row['description'] . " - Price: $" . $row['cost'] . " - Image: <img src='" . $row['image'] . "' width='50' height='50'><br>";
    }
}

function addProduct($conn) {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $image = $_POST['image'];

    $sql = "INSERT INTO products (product_name, description, cost, image) VALUES ('$product_name', '$description', '$cost', '$image')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function removeProduct($conn) {
    $product_id = $_POST['product_id'];

    $sql = "DELETE FROM products WHERE product_id = '$product_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Product removed successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function modifyProduct($conn) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $image = $_POST['image'];

    $sql = "UPDATE products SET product_name='$product_name', description='$description', cost='$cost', image='$image' WHERE product_id='$product_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function getAllServices($conn) {
    $sql = "SELECT * FROM services";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "Service ID: " . $row['service_id'] . " - Name: " . $row['service_name'] . " - Description: " . $row['description'] . " - Cost: $" . $row['cost'] . "<br>";
    }
}

function addService($conn) {
    $service_name = $_POST['service_name'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];

    $sql = "INSERT INTO services (service_name, description, cost) VALUES ('$service_name', '$description', '$cost')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New service added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function removeService($conn) {
    $service_id = $_POST['service_id'];

    $sql = "DELETE FROM services WHERE service_id = '$service_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Service removed successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function getMessages($conn) {
    $sql = "SELECT * FROM messages";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "Message ID: " . $row['message_id'] . " - User ID: " . $row['user_id'] . " - Message: " . $row['message'] . "<br>";
    }
}

$conn->close();
?>
