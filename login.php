<?php
session_start();
include "connection.php";

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_email'] = $email;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['name']; // Assuming you have a name column

            // Check if the user is an admin based on the email
            if ($email == "admin@ecp.com" && $password == "administration0111") {
                header("Location: admin.php"); // Redirect to admin page upon successful admin login
            } else {
                header("Location: signedinhome.php"); // Redirect to home page upon successful user login
            }
            exit;
        } else {
            $error = "Incorrect password";
        }
    } else {
        $error = "User not found";
    }

    // Close the statement
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7; /* light gray background */
    color: #333; /* dark gray text */
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff; /* white background for main container */
    border: 1px solid #e0e0e0; /* very light gray border */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* subtle shadow */
    border-radius: 10px; /* rounded corners */
}

h2 {
    color: #333; /* dark gray text */
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
    background-color: #f7f7f7; /* light gray background */
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
    color: #333; /* dark gray text */
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
    color: #333; /* dark gray text */
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
}</style>
</head>
<body>
    <div class="container" id="Signin">
        <h2 class="form-title">Sign In to your  account</h2>
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                <span id="togglePassword" class="toggle-password"><i class="fas fa-eye"></i></span>
            </div>

            <input type="submit" class="btn" value="Sign In" name="signIn">
            <p> Don't have an account? </p>  <a href="signup.php">Sign Up</a>
        </form>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const toggleIcon = this.querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>