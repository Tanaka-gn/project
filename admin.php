<?php include 'connection.php';
      include 'navbarpages.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome, Admin!</p>
        <hr>
        <h2>Statistics</h2>
        <ul>
            <li><a href="#" id="view-users">View Number of Users</a></li>
            <li><span id="num-users"></span></li>
            <li><a href="#" id="view-products">View Number of Products Left</a></li>
            <li><span id="num-products"></span></li>
            <li><a href="#" id="view-orders">View Number of Orders</a></li>
            <li><span id="num-orders"></span></li>
            <li><a href="#" id="view-services">View Number of Services</a></li>
            <li><span id="num-services"></span></li>
        </ul>
        <hr>
        <h2>Product Management</h2>
        <button class="button" id="add-product">Add Product</button>
        <button class="button" id="remove-product">Remove Product</button>
        <button class="button" id="modify-product">Modify Product</button>
        <button class="button" id="view-all-products">View All Products</button>
        <div id="product-form"></div>
        <div id="all-products"></div>
        <hr>
        <h2>Service Management</h2>
        <button class="button" id="add-service">Add Service</button>
        <button class="button" id="remove-service">Remove Service</button>
        <button class="button" id="view-all-services">View All Services</button>
        <div id="service-form"></div>
        <div id="all-services"></div>
        <hr>
      
    </div>

    <script>
        function fetchData(url, elementId, text) {
            document.getElementById(elementId).innerHTML = `<span class="loading">Loading...</span>`;
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    document.getElementById(elementId).innerHTML = `${text} ${data}`;
                })
                .catch(error => {
                    document.getElementById(elementId).innerHTML = `Error: ${error.message}`;
                });
        }

        document.getElementById('view-users').addEventListener('click', function() {
            fetchData('adminoperations.php?operation=get_users_count', 'num-users', 'Number of Users:');
        });

        document.getElementById('view-products').addEventListener('click', function() {
            fetchData('adminoperations.php?operation=get_products_count', 'num-products', 'Number of Products Left:');
        });

        document.getElementById('view-orders').addEventListener('click', function() {
            fetchData('adminoperations.php?operation=get_orders_count', 'num-orders', 'Number of Orders:');
        });

        document.getElementById('view-services').addEventListener('click', function() {
            fetchData('adminoperations.php?operation=get_services_count', 'num-services', 'Number of Services:');
        });


        document.getElementById('view-all-products').addEventListener('click', function() {
            document.getElementById('all-products').innerHTML = '<span class="loading">Loading...</span>';
            fetch('adminoperations.php?operation=get_all_products')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('all-products').innerHTML = data;
                })
                .catch(error => {
                    document.getElementById('all-products').innerHTML = `Error: ${error.message}`;
                });
        });

        function handleProductForm(url, formHtml) {
            document.getElementById('product-form').innerHTML = formHtml;
            document.querySelector('#product-form form').addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(this);
                fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    document.getElementById('product-form').innerHTML = '';
                    document.getElementById('view-products').click();
                })
                .catch(error => {
                    alert(`Error: ${error.message}`);
                });
            });
        }

        document.getElementById('add-product').addEventListener('click', function() {
            const formHtml = `
                <form id="add-product-form">
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" required><br><br>
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" required><br><br>
                    <label for="product_price">Product Price:</label>
                    <input type="number" id="product_price" name="product_price" required><br><br>
                    <label for="image">Image URL:</label>
                    <input type="text" id="image" name="image" required><br><br>
                    <button type="submit">Add Product</button>
                </form>
            `;
            handleProductForm('adminoperations.php?operation=add_product', formHtml);
        });

        document.getElementById('remove-product').addEventListener('click', function() {
            const formHtml = `
                <form id="remove-product-form">
                    <label for="product_id">Product ID:</label>
                    <input type="number" id="product_id" name="product_id" required><br><br>
                    <button type="submit">Remove Product</button>
                </form>
            `;
            handleProductForm('adminoperations.php?operation=remove_product', formHtml);
        });

        document.getElementById('modify-product').addEventListener('click', function() {
            const formHtml = `
                <form id="modify-product-form">
                    <label for="product_id">Product ID:</label>
                    <input type="number" id="product_id" name="product_id" required><br><br>
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" required><br><br>
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" required><br><br>
                    <label for="product_price">Product Price:</label>
                    <input type="number" id="product_price" name="product_price" required><br><br>
                    <label for="image">Image URL:</label>
                    <input type="text" id="image" name="image" required><br><br>
                    <button type="submit">Modify Product</button>
                </form>
            `;
            handleProductForm('adminoperations.php?operation=modify_product', formHtml);
        });

        document.getElementById('add-service').addEventListener('click', function() {
            const formHtml = `
                <form id="add-service-form">
                    <label for="service_name">Service Name:</label>
                    <input type="text" id="service_name" name="service_name" required><br><br>
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" required><br><br>
                    <label for="cost">Cost:</label>
                    <input type="number" id="cost" name="cost" required><br><br>
                    <button type="submit">Add Service</button>
                </form>
            `;
            handleProductForm('adminoperations.php?operation=add_service', formHtml);
        });

        document.getElementById('remove-service').addEventListener('click', function() {
            const formHtml = `
                <form id="remove-service-form">
                    <label for="service_id">Service ID:</label>
                    <input type="number" id="service_id" name="service_id" required><br><br>
                    <button type="submit">Remove Service</button>
                </form>
            `;
            handleProductForm('adminoperations.php?operation=remove_service', formHtml);
        });

        document.getElementById('view-all-services').addEventListener('click', function() {

            document.getElementById('all-services').innerHTML = '<span class="loading">Loading...</span>';
                fetch('adminoperations.php?operation=get_all_services')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('all-services').innerHTML = data;
                    })
                    .catch(error => {
                        document.getElementById('all-services').innerHTML = `Error: ${error.message}`;
                    });
            }
        );
    
    </script>
</body>
</html>
