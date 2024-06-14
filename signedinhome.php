<?php
include "connection.php";

session_start();

// Check if the user is logged in
if (isset($_SESSION['firstName'])) {
    $userName = $_SESSION['firstName'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <link rel="stylesheet" href="style.css">
    <script src="myscripts.js" defer></script>
   
  
</head>
<body>
<div class="background-clip">
        <video autoplay loop muted playsinline class="video">
            <source src="backgroundv.mp4" type="video/mp4">
        </video>
    </div>


<nav>
        <div class="logo"><img src="logolight.jpg" alt="Logo"></div>
        <ul>    
            <li><a href="home.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="service.php">Services</a></li>
            <li><a href="contactus.php">Contact</a></li>
            <li><a href="projects.php">Gallery</a></li>
            <li><a href="purchase.php">Shop</a></li>
        </ul>
        <button class="logout" onclick="location.href='home.php'"> Log OUt</button>
</nav>
    <div class="hero">
        <div class="bgimage"></div>
        <h1>Welcome to Elevate Construction Projects</h1>
            <p>Where integrity, quality, honesty, and diversity are the cornerstones of our work. We are dedicated to delivering exceptional construction services, ensuring every project is built to the highest standards. 
                Elevate your expectations with us..</p>
    </div>
    <section class="about">
        <div class="bgimage2"></div>
        <h2>Our Projects</h2>
            
            <p>at Elevate, we're not just constructing buildings; we're crafting legacies.
                Our unwavering commitment to excellence, integrity, and innovation, is what 
                sets us apart from others. We don't just meet expectations; we exceed them,
                 turning your visions into tangible realities. From the first brick laid to the final switch flipped,
                  our team embodies professionalism, punctuality, and unparalleled craftsmanship. Join us as we redefine construction, 
                  one project at a time
            </p>
        <button class="see-more" onclick="location.href='aboutus.php'">See More</button>
    </section>
    <section class="services">
        <h2>Our Services</h2>
        <div class="services-grid">
            <div class="service-box">
                <h3>BUILDING</h3>
                <p>Our maintenance services are aimed at keeping your property in top condition, addressing any issues promptly and ensuring its long-term functionality and durability.</p>
                <button class="serviceknowmore" onclick="location.href='service.php'">Know More</button>
            </div>
            <div class="service-box">
                <h3>LANDSCAPE</h3>
                <p>Maintain a manicured appearance for your lawn and garden with our regular mowing and maintenance services, ensuring a neat and tidy outdoor space year-round.</p>
                <button class="serviceknowmore" onclick="location.href='service.php'">Know More</button>
            </div>
            <div class="service-box">
                <h3>SOLAR AND ELECTRONICS</h3>
                <p>We offer routine maintenance services to keep your solar and electrical systems running smoothly, maximizing their lifespan and performance.</p>
                <button class="serviceknowmore" onclick="location.href='service.php'">Know More</button>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2023 Your Website. All rights reserved.</p>
    </footer>
    <button class="scroll-to-top" onclick="scrollToTop()">&#8679;</button>
    <script src="myscripts.js"></script>
</body>
</html>
