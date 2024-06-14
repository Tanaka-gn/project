<?php
include 'connection.php';

// Query to retrieve all products from the cart
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

// Initialize variables to store cart items and total cost
$cartItems = [];
$totalcost = 0;

// Check if there are any items in the cart
if ($result->num_rows > 0) {
    // Fetch each row from the result set
    while ($row = $result->fetch_assoc()) {
        // Add the item to the cartItems array
        $cartItems[] = $row;
        // Calculate total cost by summing up the costs of all items
        $totalcost += $row['cost'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* slightly lighter gray background */
            margin: 0;
            padding: 0;
            color: #333; /* dark gray text for better readability */
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff; /* white background for main container */
            border: 1px solid #e0e0e0; /* very light gray border */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* subtle shadow */
            border-radius: 10px; /* rounded corners for the container */
        }

        h2 {
            color: #444; /* slightly lighter dark gray text */
            margin-top: 0;
            font-size: 1.8em; /* larger font size for heading */
            border-bottom: 2px solid #8B0A1A; /* maroon bottom border */
            padding-bottom: 10px;
        }

        .col-100, .col-50 {
            background-color: #fff; /* white background */
            border: 1px solid #e0e0e0; /* very light gray border */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* subtle shadow */
            border-radius: 10px; /* rounded corners */
            margin-bottom: 20px; /* spacing between sections */
            padding: 20px;
        }

        #cartItems {
            padding: 20px;
            border-bottom: 1px solid #e0e0e0; /* very light gray border */
        }

        #cartTotal {
            padding: 20px;
            background-color: #f4f4f4; /* slightly lighter gray background */
            border-top: 1px solid #e0e0e0; /* very light gray border */
        }

        #cartTotal p {
            font-weight: bold;
            color: #8B0A1A; /* maroon text */
            font-size: 1.2em; /* larger font size for total */
        }

        .col-50 {
            width: calc(50% - 10px); /* two columns with gap */
        }

        .two-columns, .box-container {
            display: flex;
            justify-content: space-between;
            gap: 20px; /* spacing between columns */
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555; /* medium gray text */
            font-size: 1em; /* standardize font size for labels */
        }

        input[type="text"], input[type="number"], select, #paymentMethod {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #e0e0e0; /* very light gray border */
            border-radius: 5px;
            background-color: #fafafa; /* light gray background for inputs */
            font-size: 1em; /* standardize font size for inputs */
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        #onlinePaymentFields, #billingAddressFields {
            display: none;
        }

        .btn {
            background-color: #8B0A1A; /* maroon background */
            color: #fff; /* white text */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em; /* standardize font size for buttons */
            transition: background-color 0.3s ease; /* smooth transition */
        }

        .btn:hover {
            background-color: #660000; /* darker maroon background */
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .two-columns, .box-container {
                flex-direction: column;
            }

            .col-50 {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="col-100">
    <div class="box">
        <h2>Cart Items</h2>
        <div id="cartItems">
            <?php
            // Check if there are any items in the cart
            if (!empty($cartItems)) {
                // Loop through each item in the cartItems array
                foreach ($cartItems as $item) {
                    // Display item details
                    echo "<p>{$item['product_id']} - R{$item['cost']}</p>";
                }
            } else {
                // Display a message if the cart is empty
                echo "<p>No items in the cart.</p>";
            }
            ?>
            <p> Delivery Fee: R150 </p>
        </div>
        <div id="cartTotal">
            <?php
            // Display total cost
            echo "<p>Sub-total: R $totalcost</p>";
            //overall Total cost
            $deliveryFee = 150;
            $finalcost =  $deliveryFee + $totalcost;
            echo "<p> Total Cost: R $finalcost </p>";
            ?>
        </div>
    </div>
</div>
<div class="container">
    <form id="checkoutForm" onsubmit="return validateForm()">
        <div class="col-50">
            <div class="box1">
                <h2>Payment</h2>
                <label for="paymentMethod">Payment Method</label>
                <select id="paymentMethod" name="paymentMethod" onchange="togglePaymentFields()">
                    <option value="online">Online Payment</option>
                    <option value="cod">Cash on Delivery</option>
                </select>
                <div id="onlinePaymentFields">
                    <label for="cname">Name on Card</label>
                    <input type="text" id="cname" name="cardname" placeholder="Steven Lindo Jumper">

                    <label for="ccnum">Credit card number</label>
                    <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">

                    <label for="expmonth">Exp Month</label>
                    <input type="text" id="expmonth" name="expmonth" placeholder="December">

                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2026">

                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="000">
                </div>
            </div>
        </div>
        <div class="col-50">
            <div class="box">
                <h2>Billing Address</h2>
                <label>
                    <input type="checkbox" id="sameAddress" name="sameAddress" onclick="toggleAddressFields()"> Same as the address used during sign-up
                </label>
                <div id="billingAddressFields">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="1234 Main St">

                    <label for="city">City</label>
                    <input type="text" id="city" name="city" placeholder="City">

                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="State">

                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip" placeholder="10001">
                </div>
            </div>
        </div>
        
        <button type="button" class="btn" onclick="redirectToPayPal()">Checkout</button>

    </form>
</div>

<script>
    

    function togglePaymentFields() {
        const paymentMethod = document.getElementById('paymentMethod').value;
        const onlinePaymentFields = document.getElementById('onlinePaymentFields');
        if (paymentMethod === 'online') {
            onlinePaymentFields.style.display = 'block';
        } else {
            onlinePaymentFields.style.display = 'none';
        }
    }

    function toggleAddressFields() {
        const sameAddress = document.getElementById('sameAddress').checked;
        const billingAddressFields = document.getElementById('billingAddressFields');
        if (sameAddress) {
            billingAddressFields.style.display = 'none';
        } else {
            billingAddressFields.style.display = 'block';
        }
    }

    function validateForm() {
        const form = document.getElementById('checkoutForm');
        const paymentMethod = document.getElementById('paymentMethod').value;
        let valid = true;
        
        if (paymentMethod === 'online') {
            const onlinePaymentFields = document.querySelectorAll('#onlinePaymentFields input[type="text"]');
            onlinePaymentFields.forEach(input => {
                if (input.value.trim() === '') {
                    alert(`${input.name} is required`);
                    input.focus();
                    valid = false;
                    return false;
                }
            });
        }
        
        if (!document.getElementById('sameAddress').checked) {
            const billingAddressFields = document.querySelectorAll('#billingAddressFields input[type="text"]');
            billingAddressFields.forEach(input => {
                if (input.value.trim() === '') {
                    alert(`${input.name} is required`);
                    input.focus();
                    valid = false;
                    return false;
                }
            });
        }
        
        if (valid) {
            alert('Form submitted successfully!');
            // Add form submission logic here, such as sending data to a server.
        }
        
        return valid;
    }

    function displayCart() {
        const cartItems = JSON.parse(localStorage.getItem('cartItems'));
        const totalcost = localStorage.getItem('totalcost');
        const cartItemsElement = document.getElementById('cartItems');
        const cartTotalElement = document.getElementById('cartTotal');
        
        if (cartItems) {
            cartItemsElement.innerHTML = Object.keys(cartItems).map(item => {
                return `<div>${item} x${cartItems[item].quantity}  R${(cartItems[item].cost * cartItems[item].quantity).toFixed(2)}</div>`;
            }).join('');
        }

        if (totalcost) {
            cartTotalElement.textContent = `Total: R${totalcost}`;
        }
    }

    // Initial toggle based on default selection
    togglePaymentFields();
    toggleAddressFields();
    displayCart();
</script>
</body>
</html>
