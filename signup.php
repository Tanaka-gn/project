<?php
if (isset($_POST['signupForm'])) {
    include "connection.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
       $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
 

    //  inputs to prevent SQL injection
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
      $password = $conn->real_escape_string($password);
    $cpassword = $conn->real_escape_string($cpassword);
    $number = $conn->real_escape_string($number);
    $address = $conn->real_escape_string($address);
    $city = $conn->real_escape_string($city);
    $province = $conn->real_escape_string($province);
  

    // Validate first name 
    if (!preg_match("/^[a-zA-Z]+$/", $name) ) {
        echo "Name and Surname should only contain letters.";
        exit;
    }

    // Validate South African phone number
    if (!preg_match("/^(\+27|0)[6-8][0-9]{8}$/", $number)) {
        echo "Please enter a valid South African phone number.";
        exit;
    }

    // Validate password strength
    if (!preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/", $password)) {
        echo "Password must be at least 8 characters long, include at least one uppercase letter, one number, and one special character.";
        exit;
    }

    // Check if passwords match
    if ($password !== $cpassword) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash the password before saving
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Check if user already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        echo "User already exists!";
    } else {
        // Insert user into database
        $insertQuery = "INSERT INTO users (name,  email, password, number, address, city, province)
                        VALUES ('$name', '$email', '$hashedPassword', '$number', '$address', '$city', '$province')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "New record created successfully";
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
  <style>  body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    color: #333;
    margin: 0;
    padding: 0;
}

.form-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.8);
    z-index: 20;
}

.form {
    background: #1c1c1c;
    color: #fff;
    padding: 40px 60px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
    width: 350px;
    max-width: 90%;
}

.form h2 {
    margin-bottom: 20px;
    font-size: 1.8rem;
}

.input-group {
    margin-bottom: 20px;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #444;
    border-radius: 5px;
    background: #2a2a2a;
    color: #fff;
}

.input-box {
    text-align: center;
}

.input-box button {
    background: #fff;
    color: #000;
    font-size: 16px;
    padding: 10px 20px;
    border: 0;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.input-box button:hover {
    background-color: #690000;
}

.two-col {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.one {
    display: flex;
    align-items: center;
    color: #ddd;
}

.one input {
    margin-right: 5px;
}

    </style>
    <script>
        function validateForm() {
            const name = document.forms["signupForm"]["name"].value;
            const number = document.forms["signupForm"]["number"].value;
            const password = document.forms["signupForm"]["password"].value;
            const cpassword = document.forms["signupForm"]["cpassword"].value;
            const city = document.forms["signupForm"]["city"].value;

            const namePattern = /^[a-zA-Z]+$/;
            const phonePattern = /^(\+27|0)[6-8][0-9]{8}$/;
            const passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

            if (!namePattern.test(name) ) {
                alert("Name and Surname should only contain letters.");
                return false;
            }

            if (!phonePattern.test(number)) {
                alert("Please enter a valid South African phone number.");
                return false;
            }

            if (!passwordPattern.test(password)) {
                alert("Password must be at least 8 characters long, include at least one uppercase letter, one number, and one special character.");
                return false;
            }

            if (password !== cpassword) {
                alert("Passwords do not match!");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
 
    <div class="form-container">
        <div class="form" id="signupForm">
            <h2>SIGN UP</h2>
            <form name="signupForm" action="signup.php" method="post" onsubmit="return validateForm()">
                <div class="input-group">
                    <input type="text" name="name" placeholder="First Name" required>
                </div>
                <div class="input-group">
                    <input type="text" name="lastName" placeholder="Last Name" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="text" name="number" placeholder="Phone number" required>
                </div>
                <div class="input-group">
                    <input type="text" name="address" placeholder="Address" required>
                </div>
                <div class="input-group">
                    <input type="text" name="city" placeholder="City" required>
                </div>
                <div class="dropdown">
                    <select name="province" required>
                        <option value="">Select your province...</option>
                        <option value="Eastern Cape">Eastern Cape</option>
                        <option value="Free State">Free State</option>
                        <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                        <option value="Limpopo">Limpopo</option>
                        <option value="Mpumalanga">Mpumalanga</option>
                        <option value="Northen Cape">Northen Cape</option>
                        <option value="North West">North West</option>
                        <option value="Western Cape">Western Cape</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <input type="password" name="cpassword" placeholder="Confirm Password" required>
                </div>
                <div class="input-box">
                    <button type="submit" name="signupForm">Sign Up</button>
                    <p> Already have an Accout? </p>
                    <button type="submit" name="signinForm">Sign In</button>
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>
